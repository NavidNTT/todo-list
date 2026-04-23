# todo-list
# Todo List Main

A simple **PHP-based Todo List web application** with user authentication, task management, and folder/category support.

## Features

- User login / authentication
- Task listing and management
- Folder/category management
- Delete folders and tasks
- Logout functionality
- Separate template structure for views
- AJAX-based interactions for some actions

## Project Structure
```bash
todo-list-main/
├── assets/
│   ├── css/
│   │   ├── auth.css
│   │   └── style.css
│   └── js/
│       └── script.js
├── bootstrap/
│   ├── config.php
│   ├── constant.php
│   └── init.php
├── libs/
│   ├── auth.php
│   ├── helper.php
│   └── libs-tasks.php
├── process/
│   ├── ajaxhandler.php
│   └── auth.php
├── tpl/
│   ├── index.php
│   └── tpl-auth.php
├── auth.php
├── index.php
├── composer.json
└── README.md
How It Works
auth.php handles authentication-related pages.
index.php is the main dashboard for authenticated users.
bootstrap/ contains configuration and initialization files.
libs/ contains reusable helper and business logic functions.
process/ contains request handlers for form submissions and AJAX requests.
tpl/ contains page templates for rendering the UI.
assets/ contains CSS and JavaScript files for the frontend.
Installation
Requirements
PHP 7.4 or higher
Web server such as Apache or Nginx
Composer (if dependencies are required)
Setup
Clone or download the repository.
Place the project inside your web server directory.
Configure database and application settings inside:
bootstrap/config.php
bootstrap/constant.php
Install dependencies if needed:
bash
composer install
Open the project in your browser.
Start from the authentication page and log in to access the dashboard.
Usage
After login, you can:

View your task list
Organize tasks by folders/categories
Delete tasks
Delete folders
Log out from the app
Technologies Used
PHP
HTML
CSS
JavaScript
Composer
Notes
This project follows a modular structure with separated bootstrap, library, process, and template layers to keep the code organized and maintainable.

License
This project is distributed under the terms specified by the original author.
