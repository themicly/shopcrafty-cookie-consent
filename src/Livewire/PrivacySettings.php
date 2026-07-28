<?php

namespace Themicly\Shopcrafty\CookieConsent\Livewire;

use Livewire\Component;
use Themicly\Shopcrafty\Modules\CMS\Models\Page;
use Themicly\Shopcrafty\Modules\Settings\Services\Settings;

/**
 * Privacy & consent configuration. Every feature here defaults OFF so existing
 * installs are unchanged until the owner opts in (a clean upgrade). The three
 * toggles independently gate the cookie banner, the checkout consent checkbox,
 * and the customer-facing GDPR self-service tools.
 */
class PrivacySettings extends Component
{
    // Cookie consent banner.
    public bool $cookieConsentEnabled = false;

    public string $cookieMessage = 'We use cookies to improve your experience.';

    /** A CMS page slug the "Learn more" link points at (empty = use a custom URL). */
    public string $policyPage = '';

    /** A custom URL for the policy link; takes precedence over the page when set. */
    public string $policyUrl = '';

    // Checkout terms consent.
    public bool $checkoutConsentEnabled = false;

    public string $checkoutConsentText = 'I agree to the Terms & Privacy Policy.';

    // Customer GDPR self-service tools (export + account deletion).
    public bool $gdprToolsEnabled = false;

    public function mount(Settings $settings): void
    {
        $this->cookieConsentEnabled = (bool) $settings->get('privacy.cookie_consent_enabled', false);
        $this->cookieMessage = (string) $settings->get('privacy.cookie_message', $this->cookieMessage);

        // One stored value holds either a CMS page slug or an absolute URL.
        $policy = (string) $settings->get('privacy.privacy_policy_page', '');
        if (str_starts_with($policy, 'http')) {
            $this->policyUrl = $policy;
        } else {
            $this->policyPage = $policy;
        }

        $this->checkoutConsentEnabled = (bool) $settings->get('privacy.checkout_consent_enabled', false);
        $this->checkoutConsentText = (string) $settings->get('privacy.checkout_consent_text', $this->checkoutConsentText);

        $this->gdprToolsEnabled = (bool) $settings->get('privacy.gdpr_tools_enabled', false);
    }

    public function save(Settings $settings): void
    {
        $data = $this->validate([
            'cookieConsentEnabled' => ['boolean'],
            'cookieMessage' => ['required', 'string', 'max:300'],
            'policyPage' => ['nullable', 'string', 'max:190'],
            'policyUrl' => ['nullable', 'url', 'max:255'],
            'checkoutConsentEnabled' => ['boolean'],
            'checkoutConsentText' => ['required', 'string', 'max:300'],
            'gdprToolsEnabled' => ['boolean'],
        ]);

        // A custom URL wins over a selected page; store whichever is set.
        $policy = trim($data['policyUrl']) !== '' ? trim($data['policyUrl']) : trim($data['policyPage']);

        $settings->setMany([
            'privacy.cookie_consent_enabled' => $data['cookieConsentEnabled'],
            'privacy.cookie_message' => $data['cookieMessage'],
            'privacy.privacy_policy_page' => $policy,
            'privacy.checkout_consent_enabled' => $data['checkoutConsentEnabled'],
            'privacy.checkout_consent_text' => $data['checkoutConsentText'],
            'privacy.gdpr_tools_enabled' => $data['gdprToolsEnabled'],
        ]);

        $this->dispatch('toast', message: 'Privacy settings saved', type: 'success');
    }

    public function render()
    {
        return view('cookieconsent::livewire.privacy-settings', [
            'pages' => Page::orderBy('title')->get(['slug', 'title']),
        ]);
    }
}
