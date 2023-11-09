# Laravel 10 Breeze and Vue 3 Project

A basic table where new items can be added and
deleted with domain switching for the logo.

## Table of Contents

- [Laravel 10 Breeze and Vue 3 Project](#laravel-10-breeze-and-vue-3-project)
  - [Table of Contents](#table-of-contents)
  - [Requirements](#requirements)
  - [Installation](#installation)
  - [Usage](#usage)
  - [License](#license)

## Requirements

- PHP 7.4+
- Composer
- Node.js (for npm packages)
- Laravel 10 (already installed)

## Installation

1. Clone this repository to your local machine:

   ```bash
   git clone https://github.com/reggiestain/zestcode-task.git

   cd your-project

   composer install

   npm install

   cp .env.example .env

   php artisan key:generate

   php artisan migrate

   npm run dev

   php artisan serve

   ```
   The project should now be up and running. Open your web browser and visit http://localhost:8000 to access the application.

## Usage

- To register a new user, visit the `/register` route.
- To log in, visit the `/login` route.
- ...

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
   

