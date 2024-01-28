# Shift Management System

## Overview

The Shift Management System is a PHP-based web application that facilitates shift scheduling, assignment, and user management. It is designed to help organizations efficiently manage shifts and user assignments.

## Features

- Admins can create, assign, and cancel shifts.
- Employees can request unassigned shifts and request coverage for assigned shifts.

## Setup

### Prerequisites

- docker

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/JadonDuby/shift-manager.git
   ```
Navigate to the project directory:
  ```bash
  cd shift-manager
  ```
Copy the example environment file:
```bash
cp .env.example .env
```
Update the .env file with your database credentials and other configuration details.

Install dependencies:

bash
Copy code
composer install
Run database migrations:

bash
Copy code
php artisan migrate
Start the development server:

bash
Copy code
php artisan serve
The application will be accessible at http://localhost:8000.

Usage
Access the application in your web browser.
Log in as an admin or an employee using the provided credentials.
Explore the shift creation, assignment, and user request functionalities.