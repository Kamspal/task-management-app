
# Simple Task Management Application

This is a simple task management application built with the Laravel framework. Users can create, read, update, and delete tasks. Each user has their own set of tasks, and the application features user authentication.

## Features

- User registration and login
- Create, view, update, and delete tasks
- Each user has their own tasks
- Responsive user interface

## Requirements

- PHP 8.1 or higher
- Composer
- Node.js and NPM (for frontend asset compilation)
- MySQL, SQLite, or another relational database

## Installation

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/your-repository-name.git
cd your-repository-name

2. Install Dependencies
- composer install
- npm install

3. Set Up Environment Variables
cp .env.example .env

4. Open the .env file and update the database credentials:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password

5. Generate Application Key:
- php artisan key:generate

6. Run Migrations
This will create the necessary database tables:
- php artisan migrate

Compile Frontend Assets
-npm run dev

7. Serve the Application
- php artisan serve