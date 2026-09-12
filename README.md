# kyakru.com College Admission Lead Website

SEO optimized PHP + MySQL website for college admission enquiries and lead capture.

## Setup

1. Upload all files to your hosting public folder.
2. Open `/install.php` in the browser.
3. Enter MySQL host, database name, username, and password.
4. Click install. It will create `config/database.php` and required tables.
5. Delete or rename `install.php` after successful setup.

The installer automatically locks itself after writing `config/database.php`.
It creates the lead, CRM admin, activity and settings tables and the first CRM
administrator. Hostinger databases must be created in hPanel first; the installer
then connects to that database and creates all required tables.

## Important Pages

- `/index.php` - Home page
- `/colleges.php` - College listing
- `/courses.php` - Course admission page
- `/admission-guidance.php` - Counselling page
- `/lead-submit.php` - Lead form handler
- `/admin/leads.php` - Simple lead view
- `/admin/login.php` - Secure lead CRM login

## P1 Jaipur landing pages

- `/bca-colleges-in-jaipur.php`
- `/mca-colleges-in-jaipur.php`
- `/bba-colleges-in-jaipur.php`
- `/mba-colleges-in-jaipur.php`
- `/engineering-colleges-in-jaipur.php`
