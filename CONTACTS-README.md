# CoralClean Contact Management

## Contact Information Update

Contact information is now stored in the database and varies by locale:

### Phone Numbers
- **Russian (ru)**: +372 5830 1348
- **Estonian (et)**: +372 8127 1375  
- **English (en)**: +372 8127 1375

### Social Media
- **Instagram**: https://www.instagram.com/coralclean.ee/
- **Facebook**: https://www.facebook.com/coralclean

## Database Structure

The `contacts` table stores locale-specific contact information:
- `locale` - Language code (ru/et/en)
- `phone` - Formatted phone number for display
- `phone_clean` - Clean phone number for tel: links
- `whatsapp` - WhatsApp URL
- `email` - Contact email
- `instagram` - Instagram profile URL
- `facebook` - Facebook page URL
- `address` - Business address

## Seeding Contact Data

To populate or update contact information:

```bash
# Run the ContactSeeder
php artisan db:seed --class=ContactSeeder
```

This will:
1. Clear existing contact data
2. Insert contact information for all three locales (ru, et, en)
3. Apply correct phone numbers based on locale

## Deployment

When deploying to production:

```bash
# 1. Run migrations
php artisan migrate

# 2. Seed contact data
php artisan db:seed --class=ContactSeeder

# 3. Clear caches
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## Files Updated

### Models
- `app/Models/Contact.php` - Contact model

### Controllers
- `app/Http/Controllers/HomeController.php` - Added $contact to home view
- `app/Http/Controllers/ServiceController.php` - Added $contact to service views

### Views
- `resources/views/partials/header.blade.php` - Phone number from $contact
- `resources/views/partials/footer.blade.php` - Phone + social links from $contact
- `resources/views/home.blade.php` - All phone/WhatsApp links updated
- `resources/views/service.blade.php` - All phone/WhatsApp links updated
- `resources/views/services-hub.blade.php` - All phone/WhatsApp links updated

### Providers
- `app/Providers/AppServiceProvider.php` - Share $contact globally with all views

### Database
- `database/migrations/2026_02_10_162122_create_contacts_table.php` - Contacts table
- `database/seeders/ContactSeeder.php` - Contact data seeder

## Usage in Views

Contact information is automatically available in all views via `$contact`:

```blade
{{ $contact->phone }}           <!-- +372 5830 1348 -->
{{ $contact->phone_clean }}     <!-- 37258301348 -->
{{ $contact->whatsapp }}        <!-- https://wa.me/37258301348 -->
{{ $contact->instagram }}       <!-- https://www.instagram.com/coralclean.ee/ -->
{{ $contact->facebook }}        <!-- https://www.facebook.com/coralclean -->
```

The contact data automatically changes based on the current locale (ru/et/en).
