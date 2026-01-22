# FoodSystem - Restaurant Management System

## Project Description
FoodSystem is a web-based Restaurant Management System developed using Laravel, PHP, and MySQL.  
It allows managing menu items, tables, orders, users, and offers in an organized and efficient way.

---

## Features
- User and role management (Admin, Waiter, Cashier, Kitchen Staff)
- Manage categories, menu items, and products
- Table management and reservations
- Order processing (instant and scheduled)
- Admin dashboard with statistics
- Create offers and discounts for menu items
- Billing and printing system

---

## Requirements
- PHP >= 8.1
- MySQL
- Composer
- Node.js and npm (for frontend assets)
- Laravel >= 10.x

---

## Installation
1. Clone the repository:
   ```bash
   git clone https://github.com/SAMIR-ALSAIED/FoodSystem-.git

Go to the project folder:
cd FoodSystem-
Install dependencies:
composer install
npm install
npm run dev
Copy the environment file and configure database settings:
cp .env.example .env

Edit the .env file and update your database credentials:
DB_DATABASE=foodsystem
DB_USERNAME=root
DB_PASSWORD=
Run migrations and seeders:
php artisan migrate --seed

Run the project locally:
php artisan serve


