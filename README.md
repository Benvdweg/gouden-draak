# Gouden Draak Restaurant Management System

## Project Overview

This project represents a refactoring of the Gouden Draak restaurant management system. The original custom PHP application has been modernized and restructured using the Laravel framework, bringing improved architecture, maintainability, and scalability to the restaurant's digital operations.

## What Happened: The Refactoring Journey

### The Original System (`development/old_code/`)

The original application was a custom-built PHP system with a procedural architecture. It consisted of:

- **Cash Desk System (`kassa/`)**: A standalone cash register interface for processing orders and sales
- **Manual Session Management**: PHP sessions handled directly with `session_start()` and `$_SESSION`
- **Procedural Code Structure**: Business logic mixed with presentation in PHP files
- **Direct Database Connections**: Custom database configuration files (`config/dbconfig.php`)
- **Inline HTML/PHP Mixing**: Views and logic tightly coupled in single files
- **Static File Structure**: HTML pages stored directly in the `paginas/` directory

The old system served its purpose but lacked:
- Separation of concerns
- Modern framework benefits (routing, middleware, ORM)
- Scalable architecture
- Code reusability
- Built-in security features

### The Modernized System (`development/new_code/`)

The entire application has been refactored into a **Laravel 11** application, following modern web development best practices:

#### Architecture Improvements

**MVC Pattern Implementation:**
- **Models** (`app/Models/`): Eloquent models for all entities (Dish, Order, Reservation, User, etc.)
- **Controllers** (`app/Http/Controllers/`): Dedicated controllers handling business logic
  - `DishController` - Menu and dish management
  - `TabletOrderController` - Table ordering system
  - `PickUpController` - Takeout ordering
  - `CheckoutController` - Order processing
  - `ReservationController` - Table reservations
  - `CustomerController` - Public-facing pages
  - `AuthController` - Authentication
  - `NewsController` - News management
  - `PageController` & `ComponentController` - CMS functionality
  - `WaiterCallController` - Waiter call system
- **Views** (`resources/views/`): Blade templates organized by feature (admin, customer, tablet)

**Routing System:**
- Clean, RESTful routes defined in `routes/web.php`
- Route grouping for logical organization (admin, tablet, pickup, etc.)
- Named routes for better maintainability

**Middleware & Security:**
- Custom `UserTypeMiddleware` for role-based access control
- Laravel's built-in authentication system
- CSRF protection
- Input validation via Form Requests

#### Feature Preservation & Enhancement

All original functionality has been preserved and enhanced:

1. **Cash Desk → Checkout System**
   - The old `kassa/` system evolved into a modern checkout interface
   - Better order management and processing workflow

2. **Table Ordering System**
   - Tablet-based ordering for restaurant tables
   - Favorites functionality
   - Order history
   - Waiter call integration

3. **Pickup Ordering**
   - Separate ordering flow for takeout customers
   - Category-based menu navigation

4. **Admin Panel**
   - Dish management (CRUD operations)
   - Reservation management
   - News message system
   - Content Management System (CMS) for custom pages
   - Component-based page building

5. **Customer-Facing Features**
   - Home page
   - Contact page
   - News page
   - Menu display
   - PDF menu downloads

#### Technical Improvements

**Database:**
- Migration-based schema management
- Eloquent ORM for database interactions
- Relationship definitions (belongsTo, hasMany, etc.)
- Seeders for initial data

**Frontend:**
- Vue.js components (`CharacterCounter.vue`, `LoginCard.vue`)
- Tailwind CSS for styling
- Vite for asset compilation
- Modern JavaScript build process

**Code Organization:**
- Service classes (`TabletOrderService`, `ComponentMovementService`)
- Form Request validation classes
- Service providers for dependency injection
- View composers for shared data

**Dependencies:**
- PDF generation (dompdf)
- QR code generation
- HTML purifier for content sanitization
- Migration generators for development

## Project Structure

```
development/
├── old_code/          # Original PHP application (preserved for reference)
│   ├── kassa/         # Cash desk system
│   ├── paginas/       # Static HTML pages
│   └── ...
│
└── new_code/          # Laravel application
    ├── app/
    │   ├── Http/
    │   │   ├── Controllers/    # Business logic
    │   │   ├── Middleware/     # Custom middleware
    │   │   └── Requests/       # Form validation
    │   ├── Models/              # Eloquent models
    │   ├── Services/            # Business services
    │   └── Providers/           # Service providers
    ├── database/
    │   ├── migrations/         # Database schema
    │   └── seeders/            # Initial data
    ├── resources/
    │   ├── views/              # Blade templates
    │   ├── js/                 # JavaScript/Vue components
    │   └── css/                # Stylesheets
    └── routes/
        └── web.php             # Application routes
```

## Key Benefits of the Refactoring

1. **Maintainability**: Clear separation of concerns makes the codebase easier to understand and modify
2. **Scalability**: Laravel's architecture supports growth and feature additions
3. **Security**: Framework-provided security features (CSRF, XSS protection, SQL injection prevention)
4. **Developer Experience**: Modern tooling, better debugging, and comprehensive documentation
5. **Code Reusability**: Services, middleware, and components can be reused across features
6. **Testing**: Laravel's testing framework enables comprehensive test coverage
7. **Performance**: Optimized queries, caching capabilities, and efficient routing

## Migration Notes

The refactoring preserved all business logic and functionality while modernizing the technical implementation. The old code remains in `development/old_code/` for reference and comparison purposes. A Python migration script (`scripts/python_scripts/old_data_to_new.py`) was used to migrate existing data from the old database structure to the new Laravel-compatible schema.

---

*This refactoring represents a significant modernization effort, transforming a legacy PHP application into a maintainable, scalable Laravel application while preserving all original functionality and improving the overall code quality and developer experience.*

