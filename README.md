# Cosmonesa

Cosmonesa is an e-commerce platform dedicated to beauty services. It provides a seamless experience for users to explore and book beauty-related services.

## Features

- User-friendly interface for browsing beauty services.
- Secure booking and payment system.
- Admin panel for managing services and users.
- Built-in authentication and authorization.

## Tech Stack

- **Framework**: Laravel 12
- **Database**: PostgreSQL
- **Frontend**: Blade templates (Laravel's templating engine)
- **Backend**: PHP (Laravel)

## Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-repo/cosmonesa.git
    cd cosmonesa
    ```

2. Install dependencies:
    ```bash
    composer install
    npm install
    ```

3. Configure environment:
    - Copy `.env.example` to `.env`:
      ```bash
      cp .env.example .env
      ```
    - Update database credentials and other settings in `.env`.

4. Run migrations and seed the database:
    ```bash
    php artisan migrate --seed
    ```

5. Start the development server:
    ```bash
    php artisan serve
    ```

6. Access the application at `http://localhost:8000`.

## Contributing

Contributions are welcome! Please fork the repository and submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).