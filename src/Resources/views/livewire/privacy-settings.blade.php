<div>
    <form wire:submit="save" class="max-w-2xl space-y-6">
        <x-admin.note variant="info">
            Every feature below is off until you turn it on. Existing stores are unaffected — switch on only
            what your business needs to comply with privacy laws like GDPR.
        </x-admin.note>

        {{-- Cookie consent banner --}}
        <x-ui.card id="cookie-consent" class="scroll-mt-6" title="Cookie consent banner" subtitle="Show a dismissible cookie notice at the bottom of your storefront.">
            <div class="space-y-5">
                <x-ui.toggle wire:model="cookieConsentEnabled" label="Show the cookie banner" />

                <x-ui.textarea
                    wire:model="cookieMessage"
                    label="Banner message"
                    rows="2"
                    hint="Shown to every visitor until they accept. Keep it short and plain."
                    :error="$errors->first('cookieMessage')"
                />

                <div class="grid gap-5 sm:grid-cols-2">
                    <x-ui.select wire:model="policyPage" label="“Learn more” page" hint="A published page with your cookie/privacy policy.">
                        <option value="">— None —</option>
                        @foreach ($pages as $page)
                            <option value="{{ $page->slug }}">{{ $page->title }}</option>
                        @endforeach
                    </x-ui.select>

                    <x-ui.input
                        wire:model="policyUrl"
                        label="…or a custom URL"
                        placeholder="https://example.com/privacy"
                        hint="Overrides the page above when filled in."
                        :error="$errors->first('policyUrl')"
                    />
                </div>

                <x-admin.note variant="tip">
                    The banner remembers a visitor's choice in their browser, so it won't nag them on every page.
                </x-admin.note>
            </div>
        </x-ui.card>

        {{-- Checkout terms consent --}}
        <x-ui.card id="checkout-consent" class="scroll-mt-6" title="Checkout consent" subtitle="Require shoppers to agree to your terms before placing an order.">
            <div class="space-y-5">
                <x-ui.toggle wire:model="checkoutConsentEnabled" label="Require agreement at checkout" />

                <x-ui.textarea
                    wire:model="checkoutConsentText"
                    label="Consent text"
                    rows="2"
                    hint="Shown next to a required checkbox on the checkout page."
                    :error="$errors->first('checkoutConsentText')"
                />

                <x-admin.note variant="info">
                    When on, an order can't be placed until the shopper ticks this box. The “Learn more” page
                    above is also linked here.
                </x-admin.note>
            </div>
        </x-ui.card>

        {{-- GDPR customer tools --}}
        <x-ui.card id="gdpr-tools" class="scroll-mt-6" title="Customer data tools (GDPR)" subtitle="Let signed-in customers export or delete their own data.">
            <div class="space-y-5">
                <x-ui.toggle wire:model="gdprToolsEnabled" label="Enable self-service data tools" />

                <x-admin.note variant="warning">
                    Adds “Download my data” and “Delete my account” to each customer's profile page. Deleting
                    scrubs personal details but keeps past orders (anonymised) for your accounting records.
                </x-admin.note>
            </div>
        </x-ui.card>

        <x-admin.form-actions>
            <x-ui.save-button target="save" label="Save changes" />
        </x-admin.form-actions>
    </form>
</div>
