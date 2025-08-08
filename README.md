# Secure PHP MySQL Login System

A secure and responsive login system built with PHP, MySQL, HTML, and CSS. Implements **CSRF tokens**, **password hashing**, and **session management** to protect against SQL injection, XSS, and CSRF attacks.

## Features
- User registration & login
- Password hashing with `password_hash()`
- CSRF token generation and validation
- Session-based authentication
- Input sanitization and SQL injection prevention
- Responsive HTML/CSS design

## Screenshots
**Landing Page (before login)**
![Landing page before login](image.png)

**Login Page**
![Login Page](image2.png)

**Registration Page**
![Registration Page](image3.png)

**Landing Page (after login)**
![Landing page after login](image4.png)

## Requirements
- PHP 7.4+ (or newer)
- MySQL 5.7+ / MariaDB
- Apache/Nginx server with PHP enabled
- Composer (optional, for dependency management)

## Installation
1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/secure-login-system.git
   cd secure-login-system
