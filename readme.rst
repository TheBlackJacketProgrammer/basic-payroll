# Basic Web-based Payroll System

## Overview

This is a web-based payroll management system built using:

- **CodeIgniter 3 (CI3)** - Backend framework for PHP
- **AngularJS** - Frontend framework for dynamic UI
- **Bootstrap** - Responsive and modern UI design
- **MySQL** - Database management system

This system helps organizations manage employee salaries, deductions, and payroll calculations efficiently.

## Features

- Employee management (CRUD operations)
- Salary computation (basic pay, deductions, allowances, and net pay)
- Payroll processing (monthly, weekly, or custom periods)
- User authentication and role-based access control
- Reports generation (pay slips, payroll summary, etc.)
- Responsive design for desktop and mobile devices

## Installation

### Prerequisites

Ensure the following are installed on your server or local development environment:

- PHP 7.2+
- MySQL 5.7+
- Apache/Nginx Web Server
- Composer (for dependency management)
- Node.js & NPM (for AngularJS dependencies)

### Setup Instructions

#### 1. Clone the Repository

```sh
 git clone https://github.com/TheBlackJacketProgrammer/basic-payroll.git
 cd payroll
```

#### 2. Configure Database

- Create a new MySQL database
- Import the SQL file located in `database/payroll_db.sql`
- Configure database settings in `application/config/database.php`

#### 3. Install Backend Dependencies

```sh
composer install
```

#### 4. Install Frontend Dependencies

```sh
npm install
```

#### 5. Configure Base URL

Modify `application/config/config.php` and update the `base_url`:

```php
$config['base_url'] = 'http://your-domain.com/';
```

#### 6. Start the Application

Run the application on a local development server:

```sh
php -S localhost:8000 -t public/
```

Or configure it on Apache/Nginx with proper virtual host settings.

## Usage

1. Open the browser and navigate to `http://localhost`
2. Login with the provided admin credentials (default in `users` table)
3. Manage employees, set up payroll, and generate reports

## Folder Structure

```
/payroll-system
├── application/    # CodeIgniter backend
├── assets/         # CSS, JS, images
├── docs/           # Documentation files
├── system/         # CI core files
├── vendor/         # Composer dependencies
├── .htaccess       # Server configuration
├── composer.json   # Composer dependencies config
├── contributing.md # Contribution guidelines
├── index.php       # Main entry point
├── license.txt     # License details
└── readme.rst      # Readme in RST format
```

## Troubleshooting

- **Issue:** Database connection error

  - Ensure correct database credentials are set in `application/config/database.php`
  - Check if MySQL service is running

- **Issue:** Styles or scripts not loading

  - Ensure the `base_url` is correctly set in `config.php`
  - Check browser console for errors

## Contributing

Pull requests are welcome! If you'd like to improve the system, feel free to fork and submit a PR.

## License

MIT License. See `LICENSE` file for more details.

## Contact

For support, contact neomaster_667@yahoo.com or visit the project repository at [GitHub](https://github.com/TheBlackJacketProgrammer/basic-payroll.git).

