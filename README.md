<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

---

# Customer Management System

A **Customer Management System** built using Laravel, featuring basic CRUD operations with added functionality for soft delete, search, sorting, and trash management.

## Features
1. **CRUD Operations**:
   - Create, Read, Update, and Delete customers.
   - Responsive interface for both desktop and mobile views.

2. **Soft Delete**:
   - Deleted customers are moved to a trash bin instead of being permanently removed.

3. **Trash Management**:
   - View soft-deleted customers.
   - Restore customers from the trash.
   - Permanently delete customers from the trash.

4. **Search and Sort**:
   - Search customers by their name or email.
   - Sort customers by creation date (oldest to newest or newest to oldest).

## Technologies Used
- **Backend**: Laravel 10
- **Frontend**: Blade templates, Bootstrap 5
- **Database**: MySQL with Soft Delete enabled

## Installation
Follow these steps to set up the project locally:

### 1. Clone the Repository
```bash
git clone <repository-url>
cd customer-crud
```

### 2. Install Dependencies
```bash
composer install
npm install && npm run dev
```

### 3. Configure Environment
- Duplicate `.env.example` and rename it to `.env`.
- Update the `.env` file with your database credentials:
  ```env
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=customer_crud
  DB_USERNAME=root
  DB_PASSWORD=
  ```

### 4. Run Migrations
```bash
php artisan migrate
```

### 5. Seed the Database (Optional)
```bash
php artisan db:seed
```

### 6. Start the Server
```bash
php artisan serve
```
Access the app at [http://localhost:8000](http://localhost:8000).

## Usage
### Routes
#### Customers
| Method | URL                    | Description               |
|--------|------------------------|---------------------------|
| GET    | `/`                    | View all customers        |
| GET    | `/customers/create`    | Create a new customer     |
| POST   | `/customers`           | Store a new customer      |
| GET    | `/customers/{id}/edit` | Edit customer details     |
| PUT    | `/customers/{id}`      | Update customer details   |
| DELETE | `/customers/{id}`      | Soft delete a customer    |

#### Trash Management
| Method | URL                              | Description                     |
|--------|----------------------------------|---------------------------------|
| GET    | `/customers/trash`              | View trashed customers          |
| PATCH  | `/customers/{id}/restore`       | Restore a trashed customer      |
| DELETE | `/customers/{id}/force-delete`  | Permanently delete a customer   |

### Search and Sort
- Use the search bar to find customers by their **first name**, **last name**, or **email**.
- Use the sort dropdown to organize results by **creation date**.

### Notifications
- Success messages for actions like creating, updating, restoring, or deleting a customer.
- Error messages for invalid operations.

## Folder Structure
- **app/Http/Controllers**:
  - `CustomerController`: Handles all customer-related operations.
- **app/Models**:
  - `Customer`: Defines the `customers` table with soft delete enabled.
- **resources/views**:
  - `layouts/`: Contains the base layout.
  - `customers/`: Includes views for listing, creating, editing, and managing trash.
- **routes/web.php**:
  - All customer-related routes are defined here.

## Additional Notes
- **Soft Delete**: Ensure the `deleted_at` column exists in the database table.
- **Validation**: Input fields are validated using Laravel's request validation.

## Future Enhancements
- Pagination for customer lists.
- Advanced filtering options (e.g., by date range or specific fields).
- Export customer data to CSV or Excel.

---

If you discover a vulnerability within this project, please send issue and i will fix it right away.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
