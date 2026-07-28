<?php

namespace Themicly\Shopcrafty\CookieConsent;

use Themicly\Shopcrafty\Core\Module\ModuleServiceProvider;
use Themicly\Shopcrafty\Core\Navigation\NavigationRegistry;

final class CookieConsentServiceProvider extends ModuleServiceProvider
{
    protected function moduleName(): string
    {
        return 'CookieConsent';
    }

    protected function modulePath(): string
    {
        return __DIR__;
    }

    protected function bootModule(): void
    {
        app(NavigationRegistry::class)->register('Legal', [
            'label' => 'Privacy & consent',
            'icon' => 'shield',
            'route' => 'admin.settings.privacy',
            'gate' => 'manage-config',
            'addon' => 'cookie-consent',
        ]);

        $this->addonRegistry()->register('cookie-consent', [
            'name' => 'Storefront cookie consent',
            'provider' => self::class,
            'settings_route' => 'admin.settings.privacy',
        ]);
        $this->addonRegistry()->registerSettingsSchema('cookie-consent', [
            'label' => 'Privacy and cookie consent',
            'fields' => [
                'privacy.cookie_consent_enabled',
                'privacy.cookie_message',
                'privacy.privacy_policy_page',
            ],
        ]);
    }
}
