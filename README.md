# Shopcrafty Cookie Consent

Cookie consent and privacy controls for Shopcrafty storefronts.

## Requirements

- PHP 8.3+
- Laravel 13+
- `themicly/shopcrafty` 1.0+

## Installation

```bash
composer require themicly/shopcrafty-cookie-consent
php artisan migrate
```

The package is auto-discovered by Laravel. Configure it at Admin → Legal →
Privacy & consent.

## Features

- Optional storefront cookie-consent banner
- Custom banner message
- Privacy policy CMS page or custom URL
- Checkout consent settings
- Customer GDPR export and deletion settings
- Privacy settings page with a section sidebar for smooth navigation

All privacy features default to disabled so installing the package does not
change an existing storefront until configured.

## Views and routes

The storefront banner is available as `cookieconsent::cookie-consent`. The
privacy settings page is available at `/admin/settings/privacy` with route name
`admin.settings.privacy`.

## License

MIT. Targets PHP 8.3+ and Laravel 13+.
