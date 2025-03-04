# Loan CRM

Test project for Loan CRM. Built with Laravel 12.

## Requirements

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL 
- Git

## Installation

1. Clone the repository
```bash
git clone https://github.com/gorandigitalnomad/loan-crm.git
cd loan-crm
```

2. Install PHP dependencies
```bash
composer install
```

3. Install NPM dependencies
```bash
npm install
```

4. Create environment file
```bash
cp .env.example .env
```

5. Generate application key
```bash
php artisan key:generate
```

6. Configure your database in `.env` file
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=loan_crm
DB_USERNAME=root
DB_PASSWORD=
```

7. Run database migrations and seeders
```bash
php artisan migrate --seed
```

8. Create storage link
```bash
php artisan storage:link
```

9. Build assets
```bash
npm run build
```

## Running the Application

1. Start the development server
```bash
php artisan serve
```

2. Start Vite development server (in a separate terminal)
```bash
npm run dev
```

The application will be available at `http://localhost:8000`

## Advisers Login Credentials

```
Adviser 1:
Email: john@loancrm.com
Password: password

Adviser 2:
Email: jane@loancrm.com
Password: password

Adviser 3:
Email: mike@loancrm.com
Password: password
```

## Features

- User Authentication & Authorization
- Client Management
- Loan Management
  - Cash Loans
  - Home Loans
- Report Generation
- Export to Excel

## Project Structure

```
├── app/
│   ├── Http/
│   │   ├── Controllers/    # Controllers
│   │   └── Middleware/     # Middleware
│   ├── Models/            # Eloquent models
│   ├── Repositories/      # Repository pattern
│   └── Services/         # Business logic
├── database/
│   ├── migrations/       # Database migrations
│   └── seeders/         # Database seeders
├── resources/
│   ├── js/             # JavaScript files
│   ├── css/           # CSS files
│   └── views/         # Blade templates
├── routes/
│   └── web.php       # Web routes
```
