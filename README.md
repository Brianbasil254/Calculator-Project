# Calculator App

A simple full-stack calculator application built with **Laravel 10 API** (PHP 8.1+) for the backend and **React.js** for the frontend. The app includes authentication and supports basic arithmetic operations.

## 🔧 Tech Stack

- **Frontend**: React, Axios, TailwindCSS, React Router
- **Backend**: Laravel 10, PHP 8.1+, MySQL
- **Authentication**: Token-based (JWT or Laravel Sanctum compatible)

---

## 📦 Features

- ✅ User login/logout
- ✅ Auth-protected calculator operations
- ✅ Addition, subtraction, multiplication, and division
- ✅ Stores calculations in the database
- ✅ Fetch single calculation history by ID (via API)

---

## ⚙️ Getting Started

### 🔐 Prerequisites

- Node.js
- Composer
- PHP 8.1+
- MySQL

---

### 🖥️ Backend Setup (Laravel)

```bash
# Clone the project
git clone <your-repo-url>
cd backend

# Install dependencies
composer install

# Set up environment
cp .env.example .env
php artisan key:generate

# Configure DB in .env, then run migrations & seeders
php artisan migrate --seed

# Serve the API
php artisan serve
