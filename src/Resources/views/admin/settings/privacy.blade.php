<x-layouts.admin title="Privacy & consent">
    <x-admin.page-header title="Privacy & consent" subtitle="Configure cookie consent, checkout consent, and customer data tools." />

    <div class="scroll-smooth flex flex-col gap-6 lg:flex-row">
        <aside class="lg:w-64 lg:shrink-0">
            <div class="lg:sticky lg:top-[4.5rem]">
                <nav aria-label="Privacy sections" class="flex gap-1 overflow-x-auto pb-1 lg:block lg:space-y-1 lg:rounded-xl lg:border lg:border-line lg:bg-surface-raised lg:p-2">
                    <p class="hidden px-3 pb-1 pt-2 text-[11px] font-semibold uppercase tracking-wider text-content-muted lg:block">Privacy & consent</p>
                    <a href="#cookie-consent" class="group relative block shrink-0 rounded-lg px-3 py-2 text-sm text-content-secondary transition-colors hover:bg-surface-sunken hover:text-content lg:shrink"> <span class="block whitespace-nowrap lg:whitespace-normal">Cookie consent</span><span class="mt-0.5 hidden text-xs text-content-muted lg:block">Storefront banner and policy</span></a>
                    <a href="#checkout-consent" class="group relative block shrink-0 rounded-lg px-3 py-2 text-sm text-content-secondary transition-colors hover:bg-surface-sunken hover:text-content lg:shrink"> <span class="block whitespace-nowrap lg:whitespace-normal">Checkout consent</span><span class="mt-0.5 hidden text-xs text-content-muted lg:block">Terms agreement at checkout</span></a>
                    <a href="#gdpr-tools" class="group relative block shrink-0 rounded-lg px-3 py-2 text-sm text-content-secondary transition-colors hover:bg-surface-sunken hover:text-content lg:shrink"> <span class="block whitespace-nowrap lg:whitespace-normal">GDPR tools</span><span class="mt-0.5 hidden text-xs text-content-muted lg:block">Customer export and deletion</span></a>
                </nav>
            </div>
        </aside>

        <main class="min-w-0 flex-1">
            <livewire:cookieconsent.privacy-settings />
        </main>
    </div>
</x-layouts.admin>
