<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Documentation

## Technologies and Frameworks Used
- Laravel Framework 11.9.2
- Laravel Breeze (did not complete)
- MySQL
- Blade Template Engine
- Bootstrap 

## Setup and Installation
- Clone the repository or download the zip file.
- Open the project folder in your terminal.
- Run `composer install` to install all the dependencies.
- Run `npm install` to install all the dependencies.
- Run `npm run dev` to compile the assets.
- Create database on MySQL to match the.env file. (database name is `blog_project_db`)
- Run `php artisan migrate` to migrate the tables.
- Run `php artisan serve` to start the server.
- Open your browser and navigate to `http://127.0.0.1:8000` to see the website.

## How to Use the Blog Platform

This guide will walk you through features and functionalities, including user registration, posting, commenting.

## Table of Contents

1. [User Registration and Authentication](#user-registration-and-authentication)
2. [Dashboard](#dashboard)
3. [Creating and Managing Posts](#creating-and-managing-posts)
4. [Comments](#comments)
5. [Following Users](#following-users)
6. [Liking Posts](#liking-posts)
7. [Profile Management](#profile-management)

## User Registration and Authentication

### Registering a New Account
1. Navigate to the registration page.
2. Fill in the required fields: `Name`, `Email`, and `Password`.
3. Confirm your password.
4. Submit the form to create your account.
5. Upon successful registration, you will be redirected to the dashboard with a success message.

### Logging In
1. Navigate to the login page.
2. Enter your `Email` and `Password`.
3. Submit the form to log in.
4. Upon successful login, you will be redirected to the dashboard with a success message.

### Logging Out
1. Click the logout button to log out of your account.
2. You will be redirected to the dashboard with a success message.

## Dashboard

### Viewing Posts
- The dashboard displays all posts in descending order by creation date.
- Use the search bar to find posts containing specific content.

## Creating and Managing Posts

### Creating a Post
1. Navigate to the post creation page.
2. Enter the post content (minimum 3 characters, maximum 240 characters).
3. Submit the form to create your post.
4. Upon successful creation, you will be redirected to the dashboard with a success message.

### Editing a Post
1. Navigate to the specific post you want to edit.
2. Click the edit button (only available if you are the post's author).
3. Update the post content.
4. Submit the form to save changes.
5. Upon successful update, you will be redirected to the post's page with a success message.

### Deleting a Post
1. Navigate to the specific post you want to delete.
2. Click the delete button (only available if you are the post's author).
3. Confirm the deletion.
4. Upon successful deletion, you will be redirected to the dashboard with a success message.

## Comments

### Adding a Comment
1. Navigate to the post you want to comment on.
2. Enter your comment in the provided field.
3. Submit the form to add your comment.
4. Upon successful creation, you will be redirected to the post's page with a success message.

## Following Users

### Following a User
1. Navigate to the user's profile page.
2. Click the follow button to follow the user.
3. Upon successful action, you will see a success message.

### Unfollowing a User
1. Navigate to the user's profile page.
2. Click the unfollow button to unfollow the user.
3. Upon successful action, you will see a success message.

## Liking Posts

### Liking a Post
1. Navigate to the post you want to like.
2. Click the like button to like the post.
3. Upon successful action, you will see a success message.

### Unliking a Post
1. Navigate to the post you want to unlike.
2. Click the unlike button to unlike the post.
3. Upon successful action, you will see a success message.

## Profile Management

### Viewing Your Profile
1. Navigate to your profile page to view your information and posts.

### Editing Your Profile
1. Navigate to your profile page.
2. Click the edit button.
3. Update your profile information, including name, bio, and profile picture.
4. Submit the form to save changes.
5. Upon successful update, you will be redirected to your profile page with a success message.

This guide covers the basic functionalities of the blog platform.

## Database Schema

### Users Table
- **id**: Primary key, auto-incrementing integer.
- **name**: String, the name of the user.
- **email**: String, unique email address of the user.
- **email_verified_at**: Timestamp, nullable, stores the date and time when the email was verified.
- **password**: String, hashed password of the user.
- **remember_token**: String, nullable, token used for "remember me" functionality.
- **image**: String, nullable, URL or path to the user's profile image.
- **bio**: String, nullable, biography of the user.
- **created_at**: Timestamp, stores the date and time when the user record was created.
- **updated_at**: Timestamp, stores the date and time when the user record was last updated.

### Password Reset Tokens Table
- **email**: Primary key, string, email of the user requesting a password reset.
- **token**: String, token used for password reset.
- **created_at**: Timestamp, nullable, stores the date and time when the token was created.

### Sessions Table
- **id**: Primary key, string, unique session identifier.
- **user_id**: Foreign key, references the `id` field in the `users` table, nullable.
- **ip_address**: String, nullable, stores the IP address of the user.
- **user_agent**: Text, nullable, stores the user agent string of the user's browser.
- **payload**: LongText, stores session data.
- **last_activity**: Integer, stores the timestamp of the last activity in the session.

### Cache Table
- **key**: Primary key, string, unique cache key.
- **value**: MediumText, stores the cache value.
- **expiration**: Integer, stores the timestamp when the cache expires.

### Cache Locks Table
- **key**: Primary key, string, unique lock key.
- **owner**: String, owner of the lock.
- **expiration**: Integer, stores the timestamp when the lock expires.

### Posts Table
- **id**: Primary key, auto-incrementing integer.
- **user_id**: Foreign key, references the `id` field in the `users` table, cascades on delete.
- **content**: String, content of the post.
- **created_at**: Timestamp, stores the date and time when the post was created.
- **updated_at**: Timestamp, stores the date and time when the post was last updated.

### Comments Table
- **id**: Primary key, auto-incrementing integer.
- **user_id**: Foreign key, references the `id` field in the `users` table, cascades on delete.
- **post_id**: Foreign key, references the `id` field in the `posts` table, cascades on delete.
- **content**: String, content of the comment.
- **created_at**: Timestamp, stores the date and time when the comment was created.
- **updated_at**: Timestamp, stores the date and time when the comment was last updated.

### Follower_User Table
- **user_id**: Foreign key, references the `id` field in the `users` table, cascades on delete.
- **follower_id**: Foreign key, references the `id` field in the `users` table, cascades on delete.
- **created_at**: Timestamp, stores the date and time when the follower relationship was created.
- **updated_at**: Timestamp, stores the date and time when the follower relationship was last updated.

### Post_Like Table
- **id**: Primary key, auto-incrementing integer.
- **user_id**: Foreign key, references the `id` field in the `users` table, cascades on delete.
- **post_id**: Foreign key, references the `id` field in the `posts` table, cascades on delete.
- **created_at**: Timestamp, stores the date and time when the like was created.
- **updated_at**: Timestamp, stores the date and time when the like was last updated.

This is the database schema my migrations are based on for my project

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

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
