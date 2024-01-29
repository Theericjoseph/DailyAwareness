# DailyAwareness
Simple Daily Awareness Tracker

## Description
DailyAwareness is a minimalist web application designed to help users track their daily awareness or mindfulness entries. It provides a straightforward interface for users to make daily entries and track their progress over time.

## Features
* User Authentication: Secure user authentication system to ensure privacy.
* Metrics Tracking: Record your daily awareness levels using customizable metrics.
* Effortless UI: Simple and intuitive user interface for a seamless experience.

## Getting Started

These instructions will help you set up and run the DailyAwareness project on your local machine.

### Prerequisites

- [PHP](https://www.php.net/) (>= 7.3)
- [Composer](https://getcomposer.org/)
- [Laravel](https://laravel.com/) (>= 8.0)
- [Node.js](https://nodejs.org/)
- [NPM](https://www.npmjs.com/)

### Installing

1. Clone the repository:

    ```bash
   git clone https://github.com/Theericjoseph/DailyAwareness.git
2. Change into project directory
   
   ```bash
   cd DailyAwareness
3. Install PHP dependencies:

   ```bash
   composer install
4. Install NPM dependencies:

   ```bash
   npm install
5. Copy the .env.example file to .env and configure your database settings.

   ```bash
   cp .env.example .env
6. Generate the application key:
   
   ```bash
   php artisan key:generate
7. Run database migrations:

   ```bash
   php artisan migrate
8. Start the Laravel development server:

    ```bash
    php artisan serve
9. Compile assets with Laravel Mix:

    ```bash
    npm run dev
    ```
The application will be available at http://127.0.0.1:8000/home.

### Usage
* Open your web browser and navigate to http://127.0.0.1:8000/home.
* Create an account or log in if you already have one.
* Use the simple interface to make daily awareness entries. (Users can add their own metrics to track).
* View your entries under the history tab

### Running the seeder
```bash
php artisan db:seed
php artisan db:seed --class=MetricSeeder
php artisan db:seed --class=EntrySeeder
```
### Entering Seeded Data

If you've run the database seeders to populate your application with test data, here's how you can access seeded accounts and view pre-filled entries.

### Seeded User Accounts

For testing purposes, the application includes seeded user accounts. You can use the following credentials to log in:

1. **User 1**
    - Email: user1@example.com
    - Password: password

2. **User 2**
    - Email: user2@example.com
    - Password: password

3. **User 3**
    - Email: user3@example.com
    - Password: password

The seeded data can be viewed under the history tab on the date 28-01-2024

