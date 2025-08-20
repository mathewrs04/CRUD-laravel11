# 📚 **Simple CRUD with Laravel 11** ✨

Welcome to the **CRUD (Create, Read, Update, Delete)** repository! This project was created to be a practical guide and a learning resource for the fundamentals of **Laravel 11**.

If you're new to Laravel, this repository is the perfect place to see how basic database operations are implemented.

---

### 💡 Why This Project?

This project is focused on the core concept of web application development: data manipulation. Each feature is designed to be a clear example of how to:

* **Create** a new entry.
* **Read** existing data.
* **Update** existing data.
* **Delete** data from the database.

The main goal is to provide a strong understanding before moving on to more complex Laravel features.

---

### 🚀 Key Features

* ✅ **Create**: Add new data to the database using a simple form.
* 📖 **Read**: Display a list of all data in a clean view.
* ✏️ **Update**: Edit existing data through a dedicated page.
* 🗑️ **Delete**: Remove data from the database with confirmation.

---

### 🛠️ Technologies Used

* **Framework:** Laravel 11
* **Language:** PHP
* **Database:** (Replace with your database, e.g., MySQL, SQLite)
* **Web Server:** (e.g., Apache, Nginx - via Laragon, XAMPP)

---

### ⚙️ How to Run the Project

Follow the steps below to download and run this project in your local environment.

#### Prerequisites

* PHP 8.2 or newer
* Composer
* Node.js & npm (if you're using Vite)

#### Installation

1.  **Clone the repository:**
    ```bash
    git clone [https://github.com/mathewrs04/CRUD-laravel11.git](https://github.com/mathewrs04/CRUD-laravel11.git)
    ```
2.  **Navigate to the project directory:**
    ```bash
    cd CRUD-laravel11
    ```
3.  **Install Composer dependencies:**
    ```bash
    composer install
    ```
4.  **Duplicate the `.env` file:**
    ```bash
    cp .env.example .env
    ```
5.  **Generate an application key:**
    ```bash
    php artisan key:generate
    ```
6.  **Configure the database:**
    Open the `.env` file and set up your database credentials.
    ```env
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```
7.  **Run database migrations:**
    ```bash
    php artisan migrate
    ```
    This will create the necessary tables in your database.

8.  **Start the development server:**
    ```bash
    php artisan serve
    ```
You can now access the application at `http://localhost:8000`.

---

### 📝 Additional Notes

This project is purely for learning purposes. The code and structure are designed to be as simple as possible to make them easy for beginners to understand.

---

### 🙏 Thank You

Thank you for visiting this repository. I hope this project helps you on your Laravel learning journey!
