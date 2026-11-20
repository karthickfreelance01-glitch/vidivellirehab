# Vidivelli Rehabilitation Centre — static Laravel 10 site

A static (database-free) Laravel 10 / PHP 8.2 site for **Vidivelli Rehabilitation
Centre**, Vellamadai, Coimbatore. The markup, CSS and JS come
from the original Tombuild + Elementor theme, so the UI and layout are
unchanged — but there is no WordPress, no database and no admin.

## Requirements
* PHP 8.2 (XAMPP 8.2 is fine)
* Composer

## Run it

```bash
cd D:\xampp8.2\htdocs\vidivellirehab
composer install          # if vendor/ is missing
php artisan serve
```

Then open http://127.0.0.1:8000

### Serving it with Apache / XAMPP
Point a virtual host's `DocumentRoot` at the **public** folder:

```apache
<VirtualHost *:80>
    ServerName vidivelli.local
    DocumentRoot "D:/xampp8.2/htdocs/vidivellirehab/public"
    <Directory "D:/xampp8.2/htdocs/vidivellirehab/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

If you open it from a sub-folder, the asset base is detected automatically.
You can still force it
(`http://localhost/vidivellirehab/public/`), set the asset base in
`.env` so the theme files still resolve:

```
ASSET_BASE=/vidivellirehab/public/
```

## Pages

| URL | View |
|---|---|
| `/` | `resources/views/pages/home.blade.php` |
| `/about` | `pages/about.blade.php` |
| `/de-addiction` | `pages/de-addiction.blade.php` |
| `/rehabilitation` | `pages/rehabilitation.blade.php` |
| `/individual-counselling` | `pages/individual-counselling.blade.php` |
| `/gallery` | `pages/gallery.blade.php` |
| `/contact` | `pages/contact.blade.php` |

Shared chrome lives in `layouts/app.blade.php`, `partials/header.blade.php`
and `partials/footer.blade.php`. The header highlights the current menu item
from the `$active` value each controller passes in.

## Site details — `config/site.php`

Name, phone numbers, email and address are centralised here and overridable
from `.env`:

```
SITE_URL=https://www.vidivellirehab.com     # used by canonical tags + schema.org
SITE_PHONE="+91 96777 14911"
SITE_EMAIL=vidivellirebacentre@gmail.com
ENQUIRY_EMAIL=vidivellirebacentre@gmail.com
```

`SITE_URL` is what the page `<head>` uses for canonical / Open Graph /
JSON-LD URLs — set it to the real domain before going live.

Visible page copy (headings, paragraphs, the Tamil content) is plain HTML
inside the Blade views — edit it there directly.

## Contact form
`POST /contact` → `App\Http\Controllers\ContactController`

* server-side validation with the original field layout and error messages
* honeypot field (`website`) to stop bots, rate-limited to 10 posts/minute
* every enquiry is appended to `storage/app/enquiries.csv`
* a formatted email goes to `ENQUIRY_EMAIL`

`MAIL_MAILER=log` out of the box — enquiries land in
`storage/logs/laravel.log` so nothing breaks before SMTP is configured.
To send for real, fill in the `MAIL_*` block in `.env`:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=...
MAIL_PASSWORD=...
MAIL_ENCRYPTION=tls
```

## Images
All photography lives in `public/assets/uploads/`:

| Path | Used for |
|---|---|
| `vidivelli/vidivelli-logo-570.png` | header logo (+ `-300` for small screens) |
| `vidivelli/vidivelli-logo.png` | footer logo |
| `vidivelli/favicon-256.png`, `public/favicon.ico` | favicon / site icon |
| `vidivelli/logo-mark.png` | page preloader |
| `vidivelli/slide-1.jpg`, `slide-2.jpg` | the two hero slider backgrounds |
| `vidivelli/service-*.jpg` | the three service cards on the home page |
| `vidivelli/page-*.jpg` | De-Addiction, Rehabilitation and Counselling pages |
| `vidivelli/about-centre.jpg` | "About us" portrait |
| `vidivelli/<campus photos>.jpg` | the 12 gallery images |
| `vidivelli/section-bg.jpg` | home page section background |
| `2023/10/about-featured-bg.jpg`, `contact-featured-bg.jpg` | inner page title banners |

To swap any picture, overwrite the file **at the same size** — the gallery
reads `data-width` / `data-height` from the markup and the `<img>` tags carry
explicit `width`/`height`, so a different aspect ratio will shift the layout.

The rest of `public/assets/` (theme, Elementor, Smart Slider, fonts) is the
original front-end code and does not need touching. Old WordPress URLs
(`/index.php/about` etc.) 301-redirect to the clean routes.
