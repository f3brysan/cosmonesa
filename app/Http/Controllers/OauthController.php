<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OauthController extends Controller
{
    public function redirectToProvider()
    {        
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        try {
            
            $user = Socialite::driver('google')->user();             
            $finduser = User::where('gauth_id', $user->id)->first();
            
            if($finduser){

                $getUser = Auth::login($finduser);

                if($finduser->hasRole(['superadmin', 'pengelola', 'seller'])){
                    return redirect()->intended('back/dashboard');
                }
                
                return redirect('/dashboard');

            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'gauth_id'=> $user->id,
                    'gauth_type'=> 'google',
                    'password' => encrypt('cosmonesa!@#')
                ]);

                $newUser->assignRole('customer');

                Auth::login($newUser);

                return redirect('/dashboard');
            }
        } catch (\Exception $th) {
            dd($th->getMessage());
        }
    }
}
