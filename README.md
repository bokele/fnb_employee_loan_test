# Simple Loan management system

<p align="center"><a href="https://github.com/bokele" target="_blank">
<img src="/public/assets/dashboard.png" width="400"></a></p>

# Brief

> Elixir Solution offers In-house loans its full-time staff members. The finance depeartment manages the application to disbursement process.

# Objective

> Build a system that will enable the loan application process with the necessary business rules.

# Tasks

-   implement the system with a framework of your choice.
-   Package the solution in a deployable package or hos it and share the url, include a readme file for instructions.
-   Include a brief write up describing your solution

## Requirements

-   Php 8.1 and above
-   Composer
-   Since this project is running laravel 9, we suggest checking out the official requirements [here](https://laravel.com/docs/9.x/upgrade#updating-dependencies)

## Installation

To skip steps 4 down ( after composer install ), you can run the below command and it would guide you through

-   Clone the repository by running the following command in your comamand line below (Or you can dowload zip file from github)

```shell
git clone https://github.com/bokele/fnb_employee_loan_test.git  ./fnb_loan
```

-   Head to the project's directory

```shell
cd fnb_loan
```

-   Install composer dependancies

```shell
composer install
```

-   Copy .env.example file into .env file and configure based on your environment

```shell
cp .env.example .env
```

-   Generate encryption key

```shell
php artisan key:generate
```

-   Migrate the database

```shell
php artisan migrate
```

-   Seed database
    ```shell
    php artisan db:seed
    ```
-   Install npm dependancies

```shell
npm install
```

-   For development or testing purposes, you can use the laravel built in server by running

```shell
php artisan serve
```

## Setup

-   Log in to the application with the following credentials

    -   Admin
        -   Email: admin@fnb.loan.co.zm
        -   Password: password
    -   Staff
        -   Email: staff@fnb.loan.co.zm
        -   Password: password

-   You would be prompted to change your password, change your passsword in the profile page to continue

## Features

### Admin

-   Ability to manage all settings
-   Ability to create, edit, view and delete branch
-   Ability to create, edit, view and delete loan type
-   Ability to create, edit, view and delete collateral type
-   Ability to create, edit, view and delete permission
-   Ability to create, edit, view and delete role
-   Ability to create, edit, view and delete user
-   Ability to create, edit, view delete, submit loan
-   Ability to verify, approve, disburse, payment and deny loan

### Staff

-   Ability to create, edit, view delete, submit loan

This project was highly inspired by [FNB ZAMBIA](https://www.fnbzambia.co.zm/) Interview Project Presentation
