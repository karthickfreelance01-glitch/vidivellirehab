<?php

return [
    'name'    => 'Vidivelli Rehabilitation Centre',

    /* Full legal / display name used in headings and metadata. */
    'legal_name' => 'Vidivelli Rehabilitation Centre',

    /* Public base URL of the site. Used by the canonical tags and schema.org
       data in the page heads. Change it once here when you go live. */
    'url' => env('SITE_URL', 'https://www.vidivellirehab.com'),

    /* Base URL path for theme assets in public/assets ("/" when public/ is the docroot). */
    'asset_base' => env('ASSET_BASE'),   // null = auto-detect from the request (works in a sub-folder too)

    'phone'   => env('SITE_PHONE', '+91 96777 14911'),
    'phone_alt' => env('SITE_PHONE_ALT', ''),
    'email'   => env('SITE_EMAIL', 'vidivellirebacentre@gmail.com'),
    'address' => 'SF-436, Saamanaickenpalayam Road, Vellamadai, Coimbatore, Tamil Nadu 641110',

    /* Where contact-form enquiries are delivered. */
    'enquiry_email' => env('ENQUIRY_EMAIL', 'vidivellirebacentre@gmail.com'),

    'contact_success' => 'Thanks for reaching out. Our team will contact you shortly.',
];
