# Laravel Blog Platform

Welcome to the Laravel Blog Site repository. This project is a blogging platform built with the Laravel framework. It allows users to create, edit, and manage blog posts, with features for author management, category filtering, and search functionality.

## Features
- User authentication with Laravel Breeze
- Create, edit, and delete blog posts
- Filter blog posts by author and category
- Search blog posts by title and body
- Email notifications for new blog posts
- API endpoints for retrieving blog posts in JSON format

## Getting Started
To get started with the project, follow these steps:

1. Clone the repository:
   ```bash
   git clone https://github.com/your-username/laravel-blog-platform.git
   cd laravel-blog-platform
   ```

2. Install Composer dependencies:
   ```bash
   composer install
   ```

3. Copy the `.env.example` file to `.env` and configure your environment variables:
   ```bash
   cp .env.example .env
   ```

4. Generate the application key:
   ```bash
   php artisan key:generate
   ```

5. Set up the database and run migrations:
   - Configure your database in the `.env` file.
   - Run migrations and seed the database:
     ```bash
     php artisan migrate --seed
     ```

6. Start the Laravel development server:
   ```bash
   php artisan serve
   ```

7. Open your browser and navigate to `http://127.0.0.1:8000` to see the blog site in action.

## Technology Stack
- **Framework**: Laravel
- **Frontend**: Blade, Tailwind CSS
- **Database**: MySQL, SQLite, or PostgreSQL
- **Authentication**: Laravel Breeze
- **Email**: Laravel Mail, Mailhog (for local development)

