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
    /**
     * Handle the callback from Google OAuth.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handleProviderCallback(): \Illuminate\Http\RedirectResponse
    {
        try {
            // Get the user from the OAuth provider
            $user = Socialite::driver('google')->user();

            // Check if the user already exists in the database
            $finduser = User::where('gauth_id', $user->id)->first();

            if ($finduser) {
                // If the user exists, login the user
                Auth::login($finduser);

                // Redirect the user to the correct dashboard
                if ($finduser->hasRole(['superadmin', 'pengelola', 'seller'])) {
                    return redirect()->intended('back/dashboard');
                }

                return redirect('/dashboard');
            } else {
                // If the user does not exist, create a new user

                // Generate a random password for the new user
                $password = strstr($user->email, '@', true);

                // Create a new user
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'gauth_id' => $user->id,
                    'gauth_type' => 'google',                    
                    'password' => encrypt($password),
                ]);

                // Assign the customer role to the new user
                $newUser->assignRole('customer');

                // Login the new user
                Auth::login($newUser);

                // Redirect the new user to the customer dashboard
                return redirect('/dashboard');
            }
        } catch (\Exception $th) {
            // If there is an error, display the error message
            dd($th->getMessage());
        }
    }
}
