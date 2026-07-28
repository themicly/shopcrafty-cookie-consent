<?php

namespace Themicly\Shopcrafty\CookieConsent\Tests\Feature;

use Themicly\Shopcrafty\Core\Module\AddonRegistry;
use Themicly\Shopcrafty\CookieConsent\Tests\TestCase;

final class CookieConsentTest extends TestCase
{
    public function test_addon_registers_privacy_settings_and_view(): void
    {
        $addon = app(AddonRegistry::class)->all()['cookie-consent'] ?? [];

        $this->assertSame('admin.settings.privacy', $addon['settings_route'] ?? null);
        $this->assertTrue(view()->exists('cookieconsent::cookie-consent'));
        $this->assertTrue(route('admin.settings.privacy') !== '');
    }
}
