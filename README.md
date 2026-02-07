# MG Visa Consultant Website

A modern, premium visa consultation website built with Laravel 11, featuring a stunning design with smooth animations and comprehensive admin functionality.

## 🚀 Features

### Frontend
- **Modern, Premium Design** - Beautiful gradient-based design with smooth animations
- **Fully Responsive** - Works perfectly on all devices (mobile, tablet, desktop)
- **Hero Section** - Eye-catching landing with statistics and call-to-action
- **Services Section** - Showcase all visa consultation services
- **Countries Section** - Display popular visa destinations
- **Process Timeline** - 4-step visa application process
- **Testimonials** - Client reviews and success stories
- **Contact Form** - Inquiry form with validation
- **WhatsApp Integration** - Floating WhatsApp button
- **Smooth Scrolling** - Animated scroll effects and parallax
- **Mobile Navigation** - Responsive hamburger menu

### Backend
- **Database Models**:
  - Services - Visa consultation services
  - Countries - Visa destination information
  - Testimonials - Client reviews
  - Inquiries - Contact form submissions
  - Visa Types - Different visa categories
  - Site Settings - Global configurations

- **Admin Features** (Ready for implementation):
  - Manage services, countries, and testimonials
  - View and manage customer inquiries
  - Update site settings
  - User authentication with Laravel Breeze/Jetstream

## 📋 Requirements

- PHP >= 8.2
- Composer
- MySQL/MariaDB
- Node.js & NPM (optional, for asset compilation)

## 🛠️ Installation

1. **Clone or navigate to the project**
   ```bash
   cd c:\wamp64\www\mgvisa
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Configure environment**
   - Copy `.env.example` to `.env`
   - Update database credentials in `.env`:
   ```
   DB_DATABASE=mgvisa
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Generate application key**
   ```bash
   php artisan key:generate
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

6. **Seed the database**
   ```bash
   php artisan db:seed
   ```

7. **Start the development server**
   ```bash
   php artisan serve
   ```

8. **Visit the website**
   ```
   http://127.0.0.1:8000
   ```

## 🗄️ Database Structure

### Services Table
- `id` - Primary key
- `title` - Service name
- `slug` - URL-friendly name
- `short_description` - Brief description
- `description` - Full description
- `icon` - FontAwesome icon class
- `image` - Service image path
- `order` - Display order
- `is_active` - Active status

### Countries Table
- `id` - Primary key
- `name` - Country name
- `slug` - URL-friendly name
- `flag_image` - Flag image path
- `short_description` - Brief description
- `description` - Full description
- `requirements` - Visa requirements
- `processing_time` - Processing duration
- `fees` - Visa fees
- `order` - Display order
- `is_popular` - Popular destination flag
- `is_active` - Active status

### Testimonials Table
- `id` - Primary key
- `client_name` - Client name
- `position` - Job title
- `company` - Company name
- `country` - Country
- `rating` - Rating (1-5)
- `message` - Review message
- `photo` - Client photo
- `order` - Display order
- `is_featured` - Featured flag
- `is_active` - Active status

### Inquiries Table
- `id` - Primary key
- `name` - Customer name
- `email` - Email address
- `phone` - Phone number
- `country_of_interest` - Desired country
- `visa_type` - Type of visa
- `message` - Inquiry message
- `status` - Status (new, contacted, converted, closed)
- `admin_notes` - Internal notes
- `contacted_at` - Contact timestamp

## 🎨 Design Features

### Color Scheme
- Primary: Modern blue/purple gradient (#6366F1 to #8B5CF6)
- Accent: Pink gradient (#EC4899)
- Text: Dark slate (#0F172A)
- Background: Clean white with off-white sections

### Typography
- Primary Font: Inter (Sans-serif)
- Display Font: Playfair Display (Serif)

### Animations
- Smooth scroll effects
- Fade-in on scroll
- Parallax hero background
- Hover transitions
- Counter animations
- Float animations

## 📱 Responsive Breakpoints
- Desktop: 1280px+
- Tablet: 768px - 1024px
- Mobile: 320px - 767px

## 🔐 Default Credentials

After seeding, you can use these credentials:
- **Admin Email**: admin@mgvisa.com
- **Password**: password

## 📂 Project Structure

```
mgvisa/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   └── InquiryController.php
│   └── Models/
│       ├── Service.php
│       ├── Country.php
│       ├── Testimonial.php
│       ├── Inquiry.php
│       ├── VisaType.php
│       └── SiteSetting.php
├── database/
│   ├── migrations/
│   │   ├── *_create_services_table.php
│   │   ├── *_create_countries_table.php
│   │   ├── *_create_testimonials_table.php
│   │   ├── *_create_inquiries_table.php
│   │   ├── *_create_visa_types_table.php
│   │   └── *_create_site_settings_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── public/
│   ├── css/
│   │   └── style.css
│   └── js/
│       └── script.js
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php
│       └── home.blade.php
└── routes/
    └── web.php
```

## 🚀 Next Steps

### Admin Panel (To be implemented)
1. Install Laravel Breeze or Jetstream:
   ```bash
   composer require laravel/breeze --dev
   php artisan breeze:install
   ```

2. Create admin controllers:
   ```bash
   php artisan make:controller Admin/ServiceController --resource
   php artisan make:controller Admin/CountryController --resource
   php artisan make:controller Admin/TestimonialController --resource
   php artisan make:controller Admin/InquiryController --resource
   ```

3. Create admin routes in `routes/web.php`

4. Build admin views for CRUD operations

### Additional Features
- [ ] Email notifications for new inquiries
- [ ] File upload for service/country images
- [ ] Multi-language support
- [ ] Blog/News section
- [ ] FAQ section
- [ ] Live chat integration
- [ ] Payment gateway integration
- [ ] Document upload portal
- [ ] Application tracking system

## 📝 Sample Data

The seeder includes:
- 6 Services (Tourist, Student, Work, Family, Document, Interview)
- 6 Popular Countries (USA, Canada, UK, Australia, Schengen, UAE)
- 6 Visa Types (Tourist, Student, Work, Business, Family, Transit)
- 4 Client Testimonials
- Multiple Site Settings
- 1 Admin User

## 🎯 SEO Optimization

- Meta tags for description and keywords
- Semantic HTML5 structure
- Fast loading with optimized assets
- Mobile-first responsive design
- Schema markup ready
- Google Analytics ready (via site settings)

## 📧 Contact Form

The contact form captures:
- Full Name (required)
- Email (required)
- Phone Number (optional)
- Country of Interest (optional)
- Visa Type (optional)
- Message (optional)

All submissions are stored in the `inquiries` table for admin review.

## 🔧 Customization

### Update Site Information
Edit the site settings in the database or create an admin panel to manage:
- Site Name
- Tagline
- Contact Email
- Phone Number
- Address
- Social Media Links
- WhatsApp Number

### Add New Services
Insert into the `services` table or use the admin panel:
```sql
INSERT INTO services (title, slug, short_description, description, icon, order, is_active)
VALUES ('New Service', 'new-service', 'Short desc', 'Full description', 'fa-icon', 7, 1);
```

## 📞 Support

For any questions or issues, contact the development team.

## 📄 License

This project is proprietary and confidential.

---

**Built with ❤️ using Laravel 11**
