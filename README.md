# ToDo App

This is a simple **ToDo App** built using **Laravel**, designed to allow users to manage tasks by creating, editing, and deleting them. The app allows users to manage their tasks with due dates, and tasks are stored in a database.

## Features

-   **Add Todo**: Add new tasks with a title, description, and due date.
-   **Edit Todo**: Edit existing tasks and update their details.
-   **Delete Todo**: Delete tasks from the list.
-   **Display Todos**: View all tasks in a user-friendly table.
-   **Due Date**: Tasks can have a due date, displayed and handled as a `date` type in the database.
-   **Responsive Design**: The app is responsive and looks great on both desktop and mobile devices.

## Technologies Used

-   **Laravel** (PHP framework)
-   **Bootstrap** (CSS framework for styling)
-   **MySQL** (Database)
-   **Carbon** (For date manipulation in Laravel)

## Installation

### Prerequisites

Make sure you have the following installed:

-   [PHP](https://www.php.net/) (version 7.4 or higher)
-   [Composer](https://getcomposer.org/)
-   [MySQL](https://www.mysql.com/)
-   [Laravel](https://laravel.com/) (Install Laravel via Composer)

### Steps to Set Up Locally

1. **Clone the repository**:

    ```bash
    git clone https://github.com/mohamedalicoder/Todo-App.git
    cd todo-app

    ```

2. **Install Dependencies**:

Run the following command to install all the required PHP dependencies:

bash
Copy code
composer install

Set Up Environment:

Copy the .env.example file to .env:

bash
Copy code
cp .env.example .env
Open the .env file and configure your database connection details. Example:

env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_app
DB_USERNAME=root
DB_PASSWORD=
Generate Application Key:

Run the following Artisan command to generate the application key:

bash
Copy code
php artisan key:generate
Run Migrations:

Run the migrations to set up the database tables:

bash
Copy code
php artisan migrate
Start the Development Server:

Start the Laravel development server:

bash
Copy code
php artisan serve
The app will be accessible at http://localhost:8000.

Usage
After installation, you can access the ToDo App by navigating to http://localhost:8000 in your browser.
On the main page, you can add new tasks with a title, description, and due date.
You can edit or delete tasks by clicking on the respective buttons in the task list.
The app will display the list of tasks, and each task has an associated due date.
File Structure
bash
Copy code
/todo-app
├── /app # Application logic
├── /database # Database migrations and seeders
├── /public # Public assets (CSS, JS, Images)
├── /resources # Views and language files
├── /routes # Web routes for the application
├── /storage # Logs and file storage
├── /tests # Unit and feature tests
├── .env # Environment variables
├── composer.json # PHP dependencies
├── .gitignore # Git ignore file
└── README.md # Project documentation
Routes
GET / - Display all tasks.
POST /todo - Add a new task.
GET /todo/{id}/edit - Edit an existing task.
PUT /todo/{id} - Update an existing task.
DELETE /todo/{id} - Delete a task.
Contributing
Fork the repository.
Create a new branch for your feature (git checkout -b feature-name).
Make your changes and commit them (git commit -am 'Add new feature').
Push to your forked repository (git push origin feature-name).
Create a pull request.
License
This project is open-source and available under the MIT License.

markdown
Copy code

### Explanation:

1. **Introduction**: A brief overview of what the app does and its key features.
2. **Technologies Used**: Lists the technologies used in the app.
3. **Installation Instructions**: Step-by-step guide on setting up the app locally.
4. **Usage Instructions**: A description of how to use the app once it’s set up.
5. **File Structure**: A simple overview of the project’s directory structure.
6. **Routes**: A list of routes used in the app.
7. **Contributing**: Instructions for contributing to the project.
8. **License**: Information about the license (MIT in this case).

Feel free to adjust any details such as the repository URL, feature list, or other parts based on your specific app!
