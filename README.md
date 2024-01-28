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
    
The application will be available at http://127.0.0.1:8000/home.

### Usage
* Open your web browser and navigate to http://127.0.0.1:8000/home.
* Create an account or log in if you already have one.
* Use the simple interface to make daily awareness entries. (Users can add their own metrics to track).
* View your entries under the history tab
  

