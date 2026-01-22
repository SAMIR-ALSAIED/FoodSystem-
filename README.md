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

1. **Clone the repository:**
   ```bash
   git clone https://github.com/SAMIR-ALSAIED/FoodSystem-.git

composer install
npm install
npm run dev

cp .env.example .env

php artisan migrate --seed

php artisan serve


