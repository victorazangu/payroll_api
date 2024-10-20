# Payroll Api
---
This guide provides step-by-step instructions for setting up and running the Laravel 11 project on your local machine.

## Prerequisites

Before you begin, ensure you have the following installed:

1. **PHP**: Version 8.1 or higher. You can check your PHP version by running:
   ```bash
   $ php -v
2. **Composer**:A dependency manager for PHP. You can install Composer by following the instructions at 	[getcomposer.org](getcomposer.org) or for mac use brew :
   ```bash
    $ brew install composer
3. **Node.js and NPM**:Required for managing JavaScript dependencies. You can download and install it from [nodejs.org](nodejs.org) to confirm node version:
   ```bash
   $ node -v
4. **MySQL**:Make sure you have a database server running. You can use tools like XAMPP or MAMP for local development or even table plus

5. **Git**:Make sure you have a git install in your machine

## Cloning the Repository
1. Clone the repository to your local machine:
   ```bash
   $ git clone https://github.com/victorazangu/payroll_api.git
2. Navigate into the project directory:
   ```bash
   $ cd payroll_api
## Installing Dependencies
1. Install PHP dependencies using Composer:
   ```bash
   $ composer install
2. Install JavaScript dependencies using NPM:
   ```bash
   $ npm i
## Configuring Environment
1. Create a copy of the .env.example file:
   ```bash
   $ cp .env.example .env
2. Update the .env file with your database and application settings. Make sure to set the following variables:
    ```plaintext
    DB_CONNECTION=mysql         # Database connection type
    DB_HOST=127.0.0.1          # Database host (localhost)
    DB_PORT=3306               # Database port (default for MySQL)
    DB_DATABASE=your_database_name  # Replace with your actual database name
    DB_USERNAME=your_database_user  # Replace with your actual database username
    DB_PASSWORD=your_database_password  # Replace with your actual database password
## Generating Application Key
1. Run the following command to generate an application key:
   ```bash
   $ php artisan key:generate
## Running Migrations
1. To set up your database tables, run:
   ```bash
   $ php artisan migrate
## Starting the Development Server
1. You can start the Laravel development server by running:
   ```bash
   $ php artisan serve
   ```
   The application should now be running at [http://localhost:8000](http://localhost:8000).
---
## Routes

## Authentication Routes
---
---
### Register a New User
- **Endpoint:** `POST /api/register`
- **Controller:** `RegisteredUserController@store`
- **Middleware:** `guest`
- **Description:** This route allows a new user to register for the application. It accepts user registration details and creates a new user account.
  **Example payload:**
   ```plaintext
   {
    "name": "Victor",
    "phone":"071626268232",
    "email": "victorsazangu1@gmail.com",
    "password": "12345678"
    }
   ```
### Log In a User
- **Endpoint:** `POST /api/login`
- **Controller:** `AuthenticatedSessionController@store`
- **Middleware:** `guest`
- **Description:** This route handles user authentication. It accepts user credentials (email and password) and return token.
  **Example payload:**
   ```plaintext
   {
    "email": "victorsazangu1@gmail.com",
    "password": "12345678"
    }
   ```
### Log Out a User
- **Endpoint:** `POST /api/logout`
- **Controller:** `AuthenticatedSessionController@destroy`
- **Middleware:** `auth:api`
- **Description:** This route allows an authenticated user to log out from the application. It invalidates and revoke the token.
### Get Authenticated User's Profile
- **Endpoint:** `GET /api/profile`
- **Controller:** Closure (returns the authenticated user)
- **Middleware:** `auth:api`
- **Description:** This route retrieves the profile information of the currently authenticated user.
## Payroll Routes
---
---
### Get All Payroll Records
- **Endpoint:** `GET /api/payroll`
- **Controller:** `PayrollDataController@index`
- **Middleware:** `auth:api`
- **Description:** This route returns a list of all payroll records. It provides essential payroll details such as employee number, name, basic salary, allowances, gross pay, deductions, and net pay.
### Get a Specific Payroll Record
- **Endpoint:** `GET /api/payroll/{payroll_number}`
- **Controller:** `PayrollDataController@show`
- **Middleware:** `auth:api`
- **Description:** This route retrieves a specific payroll record based on the provided employee number (payroll number). It returns detailed payroll information for the specified employee.
---
---
# Postman Collection Installation
This document provides instructions on how to install and use the Postman collection for the Payroll api System.
## Prerequisites
- Ensure that you have Postman installed on your machine. If you don't have it yet, you can download it from the [Postman official website](https://www.postman.com/downloads/).
### Steps to Install the Postman Collection
1. **Locate the Postman Collection File:**
    - In your Laravel project, navigate to the root directory where the Postman collection file is located. The file named `Payroll Api.postman_collection.json`.
2. **Open Postman:**
    - Launch the Postman application on your computer.
3. **Import the Collection:**
    - Click on the **Import** button in the top left corner of the Postman interface.
    - In the import modal, select the **File** tab.
    - Drag and drop the Postman collection file into the window, or click on **Choose Files** to browse your computer and select the file.

4. **Review the Collection:**
    - After importing, you should see the collection listed in the left sidebar under the **Collections** tab.
    - Click on the collection to expand and view the available requests.
5. **Send Requests:**
    - Click on any request within the collection to view its details.
    - Make sure the server is running.register or login to start using all the environemt variables are already been configured and the token will be automatically set up in headers just run.
    - Click the **Send** button to execute the request.

## Conclusion

You have successfully installed and imported the Postman collection for the Payroll Api System. You can now use this collection to interact with the API endpoints defined.

