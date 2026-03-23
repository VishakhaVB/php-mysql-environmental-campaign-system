# EcoConnect - Environmental Campaign Community (PHP + SQL Practice Project)

A beginner-friendly full-stack practice project built with PHP, MySQL, HTML, CSS, and JavaScript.

This project simulates an environmental campaign platform where users can:
- sign up and log in,
- browse campaign/community/impact pages,
- submit volunteer registrations,
- send contact inquiries.

It is designed to help practice core backend concepts such as form handling, sessions, authentication, MySQL CRUD inserts, and page access control.

## Project Topic

The project theme is **environmental campaigns and community participation**.
It focuses on organizing cleanup drives, plantation campaigns, volunteer contributions, and impact reporting.

## Key Features

- User registration with validation
- User login/logout with session management
- Password hashing using `password_hash()` and verification via `password_verify()`
- Protected pages (Campaign, Community, Volunteer, Impact, Contact) requiring login
- Public home page (guest mode supported)
- Volunteer form submission saved to database
- Contact inquiry form submission saved to database
- Responsive UI with sidebar + mobile toggle
- Beginner-friendly backend setup that can auto-create database tables

## Tech Stack

- Frontend: HTML, CSS, JavaScript
- Backend: PHP (mysqli)
- Database: MySQL
- Session/Auth: Native PHP sessions

## Current Folder Structure

```
cep_project/
  README.md
  css/
    style.css
  html/
    campaign.html
    communiti.html
    community.html
    contact.html
    homepage.html
    imapact.html
    impact.html
    login.html
    signup.html
    volunteer.html
  images/
    ...
  pages/
    campaign.php
    community.php
    contact.php
    homepage.php
    impact.php
    login.php
    signup.php
    volunteer.php
  php/
    contact_submit.php
    db.php
    loginform.php
    logout.php
    signup.php
    volunteer_submit.php
  sql/
    database.sql
```

## How the App Flow Works

1. User opens a page in `html/`.
2. That file redirects to the corresponding PHP page in `pages/`.
3. PHP pages render UI and check login state (session).
4. Forms post to handlers in `php/`.
5. Handlers validate input and write to MySQL.

## Database Design

Database name: `login_system`

Tables:
- `users`
  - `id`, `name`, `email` (unique), `password`, `created_at`
- `volunteer_registrations`
  - `id`, `full_name`, `email`, `phone`, `skill`, `motivation`, `created_at`
- `contact_inquiries`
  - `id`, `name`, `email`, `message`, `created_at`

Schema is available in `sql/database.sql`.

## Setup Instructions

## 1. Prerequisites

- PHP 8.x (or 7.4+)
- MySQL Server
- Web server environment (XAMPP/WAMP/Laragon) or PHP built-in server

## 2. Configure Database Connection

Open `php/db.php` and verify these values match your local MySQL setup:

- host (`$DB_HOST`)
- username (`$DB_USER`)
- password (`$DB_PASS`)
- port (`$DB_PORT`)

Current code uses MySQL port `3307`.
If your MySQL runs on `3306`, change `$DB_PORT` to `3306`.

## 3. Create Database/Tables

You can use either method:

- Auto mode (already built in):
  - Running the app executes table creation in `php/db.php`.
- Manual mode:
  - Import `sql/database.sql` using phpMyAdmin or MySQL CLI.

## 4. Run the Project

From project root, run:

```bash
php -S 127.0.0.1:8080
```

Then open:

- `http://127.0.0.1:8080/html/homepage.html`

Note: Redirect files in `html/` currently point to `http://127.0.0.1:8080/...`, so keep the same host/port for easiest setup.

## Authentication and Access Rules

- Public access:
  - Home page can be viewed without login.
- Restricted access (login required):
  - Campaigns
  - Community
  - Volunteer
  - Impact
  - Contact
- Logout clears session and returns user to login page.

## Practice Concepts Covered

This project is great for practicing:
- PHP superglobals (`$_POST`, `$_GET`, `$_SESSION`)
- Server-side validation
- Prepared statements with `mysqli_prepare`
- Password hashing best practices
- Access control with session checks
- Organizing code into pages, handlers, and shared DB config

## Suggested Next Improvements

- Add CSRF protection tokens for forms
- Add email uniqueness + stronger password policy messages on frontend
- Create admin dashboard to view volunteer/contact submissions
- Add pagination/search for submissions
- Move repeated sidebar/header/footer into reusable PHP includes
- Improve URL routing to remove redirect-only HTML files
- Add project screenshots and demo GIF to this README

## Author Note

This is a practice project focused on learning practical PHP + SQL workflow.
The structure and code style are intentionally simple and readable for students and beginners.
