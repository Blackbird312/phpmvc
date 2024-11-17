# Mini Product Management Application (PHP MVC)

## Introduction

This project demonstrates the implementation of a **mini product management application** using the **MVC (Model-View-Controller)** architecture in PHP. The application is designed to showcase best practices in software architecture by separating concerns between data handling (Model), user interface (View), and application logic (Controller).

---

## Table of Contents

- [Mini Product Management Application (PHP MVC)](#mini-product-management-application-php-mvc)
  - [Introduction](#introduction)
  - [Table of Contents](#table-of-contents)
  - [Features](#features)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
  - [Contributors](#contributors)
  - [License](#license)

---

## Features

1. **Product Management**: Create, read, update, and delete (CRUD) operations for products.
2. **Category Management**: Create, read, update, and delete (CRUD) operations for Categories.
3. **No Framework**: The application demonstrates MVC principles without relying on external frameworks.
4. **Data Validation**: Advanced server-side validation for product fields.

---

## Prerequisites

- **PHP Knowledge**:
  - Syntax, variables, loops, and functions.
  - Object-Oriented Programming (OOP) basics.
- **Database Knowledge**:
  - MySQL or MariaDB setup and basic SQL queries.
  - Familiarity with PDO (PHP Data Objects) for secure database interaction.
- **Frontend Basics**:
  - HTML, CSS, and basic JavaScript for UI creation and interaction.
- **Server Setup**:
  - Apache or Nginx with proper configuration.
  - Development environment (e.g., XAMPP, WAMP, or MAMP).
- **Version Control**: Git for project management.

---

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Blackbird312/phpmvc.git
   cd php-mvc

2. Set up the database:
    Create a MySQL database.
    Import the provided SQL schema.

3. Configure the application:
    Edit config/database.php with your database credentials.

4. Run the application:

Place the project in your web server's root directory.
Access the application via http://localhost/php-mvc.

## Usage

Open the application in a browser.
Access the product listing or management features.

```bash
php-mvc/
├── controllers/
│   └── ProductController.php
|   └── CategoryController.php
├── models/
│   └── Product.php
│   └── Category.php
├── views/
│   └── Product/
|   |   └── product-list.php
|   |   └── create.php
|   |   └── edit.php
│   └── Category/
|       └── category-list.php
|       └── create.php
|       └── edit.php
├── index.php
├── config/
│   └── database.php
├── helpers/
|   └── UploadHelpers.php
├── uploads/
|   └── product_image/
|   └── category_image/
├── LICENSE/
├── README/
└── database/
    └── phpmvc.sql ( import in your database )
```

- Controllers: Handle business logic and communication between models and views.
- Models: Interact with the database.
- Views: Display data to the user.
- Index: Entry point for routing requests.

## Contributors
MOHAMMED-BEN : https://github.com/MOHAMMED-BE

## License
This project is licensed under the MIT License. See the LICENSE file for details.