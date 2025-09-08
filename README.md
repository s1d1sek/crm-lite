# CRM-Lite

A lightweight Customer Relationship Management (CRM) system built with Laravel, designed for managing customers and their orders efficiently.

## 🚀 Features

- **Customer Management**: Full CRUD (Create, Read, Update, Delete) operations for customers.
- **Order System**: Create and manage orders linked to specific customers.
- **Robust Validation**: Server-side validation with custom error messages.
- **Clean UI**: Built with Laravel Blade and Tailwind CSS.
- **Export Functionality**: Export customer data to CSV.
- **Authentication**: Secure user authentication (Laravel Breeze).

## 🛠️ Tech Stack

- **Backend**: Laravel 10+, PHP 8.4
- **Frontend**: Blade Templating, Tailwind CSS
- **Database**: SQLite / MySQL
- **Authentication**: Laravel Breeze

## 📦 Installation

1.  **Clone the repository**
    ```bash
    git clone https://github.com/s1d1sek/crm-lite.git
    cd crm-lite
    ```

2.  **Install PHP dependencies**
    ```bash
    composer install
    ```

3.  **Setup environment**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```
    Configure your database in the `.env` file (e.g., `DB_CONNECTION=sqlite`).

4.  **Run migrations**
    ```bash
    php artisan migrate
    ```

5.  **Start the development server**
    ```bash
    php artisan serve
    ```
    Visit `http://localhost:8000` in your browser.

## 🎯 How to Use

1.  **Register/Login**: Create an account or log in.
2.  **Manage Customers**: Use the "Customers" link in the navigation to view, add, edit, and soon delete customers.
3.  **Create Orders**: Click "View" on a customer to see their details and add orders for them.
4.  **Export Data**: Use the "Export CSV" button to download customer data.

## 📁 Project Structure
