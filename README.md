# Melbourne Legal Lawyers - Laravel Website

This is a Laravel 11 implementation of the Melbourne Legal Lawyers website, recreated from the original Nuxt.js/Vue.js project.

## Requirements

- PHP 8.1 or higher
- Composer
- Node.js 20 or higher
- NPM or Yarn

## Installation

1. **Install PHP dependencies:**
```bash
composer install
```

2. **Install Node dependencies:**
```bash
npm install
```

3. **Copy environment file:**
```bash
cp .env.example .env
```

4. **Generate application key:**
```bash
php artisan key:generate
```

5. **Configure your environment variables in `.env`:**
```env
APP_NAME="Melbourne Legal Lawyers"
APP_URL=http://localhost

# Mail Configuration
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-smtp-username
MAIL_PASSWORD=your-smtp-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=info@melbournelegallawyers.com.au
MAIL_FROM_NAME="${APP_NAME}"

# Contact Form Settings
CONTACT_EMAIL=info@melbournelegallawyers.com.au
SEND_CONFIRMATION_EMAIL=false
```

6. **Run migrations (if needed):**
```bash
php artisan migrate
```

7. **Build assets:**
```bash
npm run build
```

Or for development with hot reload:
```bash
npm run dev
```

8. **Start the development server:**
```bash
php artisan serve
```

Visit `http://localhost:8000` to view the website.

## Project Structure

- `resources/views/` - Blade templates
- `resources/css/` - SCSS stylesheets
- `resources/js/` - JavaScript files
- `public/images/` - Images and assets
- `app/Http/Controllers/` - Controllers
- `routes/web.php` - Routes

## Features

- ✅ Responsive design matching the original
- ✅ Scroll animations
- ✅ Mobile hamburger menu
- ✅ Contact form with email functionality
- ✅ SMTP email configuration
- ✅ Form validation
- ✅ Toast notifications
- ✅ Smooth scrolling
- ✅ Active section highlighting in navigation

## Email Configuration

The contact form requires SMTP configuration. Update your `.env` file with your SMTP credentials:

- `MAIL_HOST` - SMTP server host
- `MAIL_PORT` - SMTP port (587 for TLS, 465 for SSL)
- `MAIL_USERNAME` - SMTP username
- `MAIL_PASSWORD` - SMTP password
- `MAIL_ENCRYPTION` - `tls` or `ssl`
- `CONTACT_EMAIL` - Where to send contact form submissions
- `SEND_CONFIRMATION_EMAIL` - Set to `true` to send confirmation emails to users

## Development

### Build Assets
```bash
npm run build
```

### Watch for Changes (Development)
```bash
npm run dev
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## Notes

- The website uses Bootstrap 5 and custom SCSS
- JavaScript animations use Intersection Observer API
- Contact form uses Laravel's built-in mail system
- All assets from the original project have been copied to `public/`

## License

Proprietary - Melbourne Legal Lawyers
# mll-v4
