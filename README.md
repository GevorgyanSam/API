# API Documentation

## Getting Started

### Prerequisites

Make sure you have the following dependencies installed on your Debian-based Linux system:

-   JavaScript: `nodejs`, `npm`
-   PHP: `php`, `composer`, `php-curl`, `php-xml`, `php-mysql`
-   MySQL: `default-mysql-server`

### Installation

Follow these steps to install API:

1. **Clone Repository:**

    ```bash
    git clone https://github.com/GevorgyanSam/API.git
    cd ./API
    ```

2. **Install Dependencies:**

    ```bash
    composer install
    ```

### Database Setup

Before building the project, set up the `.env` file and run the migrations:

1. **Run Migrations:**

    ```bash
    php artisan migrate
    ```

2. **Seed Database:**

    ```bash
    php artisan db:seed
    ```

### Run

After setting up the database, run the application:

1. **Run Server:**

    ```bash
    php artisan serve
    ```

2. **Run Worker:**

    ```bash
    php artisan queue:work
    ```

The application should be accessible in your web browser at [http://localhost:8000](http://localhost:8000).