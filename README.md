# SprintSpace

SprintSpace is a secure Laravel web application for managing software projects.  
It enables public users to browse and search projects, while authenticated users can create, update, and manage their own projects.

---

## Live System
`ADD YOUR LIVE LINK HERE`

## Repository
https://github.com/DMJNR/SprintSpace

---

## Test Credentials
- Email: `test@example.com`
- Password: `password123`

---

## Core Functionality

### Public Users
- View all projects (`ProjectController@index`)
- Search projects by title/start date (`ProjectController@index`)
- View project details (`ProjectController@show`)
- Register account (Laravel Breeze)

### Registered Users
- Log in / log out (Laravel Breeze)
- Create project (`ProjectController@store`)
- View own projects (`ProjectController@myProjects`)
- Update own project (`ProjectController@update`)
- Delete own project (`ProjectController@destroy`)

---

## Security Features

- Authentication → Laravel Breeze
- Authorisation → `ProjectPolicy`
- Password hashing → Laravel auth system
- CSRF protection → Blade `@csrf`
- Server-side validation → Form Requests
- SQL injection protection → Eloquent ORM
- XSS protection → Blade escaping

---

## Database Structure

### Users
- id, username, email, password

### Projects
- id, user_id, title, start_date, end_date, short_description, phase
---

## Key Files

- `ProjectController.php` → CRUD logic
- `DashboardController.php` → Dashboard
- `ProjectPolicy.php` → Access control
- `StoreProjectRequest.php` → Create validation
- `UpdateProjectRequest.php` → Update validation
- `routes/web.php` → Routes

---

## Setup

```bash
git clone https://github.com/DMJNR/SprintSpace.git
cd SprintSpace

composer install
npm install

cp .env.example .env
php artisan key:generate

- update .env settings, then run:
php artisan migrate
php artisan db:seed
composer run dev

---

## Author

David Moses