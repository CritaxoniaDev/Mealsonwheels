<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Meals on Wheels

<p align="center"><img src="{{ asset('images/logo.png') }}" width="400" alt="Meals on Wheels Logo"></p>

## About Meals on Wheels

Meals on Wheels is a web application built with Laravel, designed to facilitate the delivery of nutritious meals to seniors and individuals in need. Our platform connects volunteers, meal providers, and recipients to create a seamless meal delivery service.

## Key Features

- User Authentication: Secure login for members, volunteers, and administrators
- Meal Management: Create, update, and manage meal plans
- Order System: Allow members to place meal orders
- Volunteer Dashboard: Coordinate meal deliveries and track volunteer activities
- Admin Panel: Oversee all operations and manage user accounts
- Responsive Design: Fully functional on both desktop and mobile devices

## How It Works

1. **Member Registration**: Seniors or individuals in need can sign up as members.
2. **Meal Selection**: Members can view available meals and select their preferences.
3. **Order Placement**: Members can place orders for meal delivery.
4. **Volunteer Assignment**: Volunteers are assigned to deliver meals based on availability and location.
5. **Meal Preparation**: Partner restaurants or kitchens prepare the meals.
6. **Delivery**: Volunteers pick up and deliver meals to members.
7. **Feedback**: Members can provide feedback on meals and service.

## Technology Stack

- **Framework**: Laravel 11.x
- **Frontend**: Blade templates with Tailwind CSS
- **Database**: MySQL
- **Authentication**: Laravel Fortify
- **API**: Stripe API for mobile app integration

## Getting Started

1. Clone the repository
2. Install dependencies: `composer install`
3. Set up your `.env` file
4. Generate application key: `php artisan key:generate`
5. Run migrations: `php artisan migrate`
6. Seed the database: `php artisan db:seed`
7. Start the development server: `php artisan serve`

## Contributing

We welcome contributions to the Meals on Wheels project. Please read our [contribution guidelines](CONTRIBUTING.md) before submitting a pull request.

## License

Meals on Wheels is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).