<footer class="bg-nova-surface border-t border-nova-line mt-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

            <!-- Marque -->
            <div>
                <span class="font-display text-2xl text-nova-white tracking-wide">
                    NOVA<span class="text-nova-red">STYLE</span>
                </span>
                <p class="text-sm text-nova-muted mt-3">
                    Mode urbaine et streetwear pour ceux qui ne suivent pas les règles.
                </p>
            </div>

            <!-- Navigation -->
            <div>
                <h3 class="font-display text-sm text-nova-white uppercase tracking-wide mb-4">Boutique</h3>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('products.index') }}" class="text-nova-muted hover:text-nova-red">Catalogue</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'hoodies']) }}" class="text-nova-muted hover:text-nova-red">Hoodies</a></li>
                    <li><a href="{{ route('products.index', ['category' => 't-shirts']) }}" class="text-nova-muted hover:text-nova-red">T-shirts</a></li>
                    <li><a href="{{ route('products.index', ['category' => 'accessoires']) }}" class="text-nova-muted hover:text-nova-red">Accessoires</a></li>
                </ul>
            </div>

            <!-- Infos -->
            <div>
                <h3 class="font-display text-sm text-nova-white uppercase tracking-wide mb-4">Informations</h3>
                <ul class="space-y-2 text-sm">
    <li><a href="{{ route('livraison') }}" class="text-nova-muted hover:text-nova-red">Livraison & retours</a></li>
    <li><a href="{{ route('cgv') }}" class="text-nova-muted hover:text-nova-red">CGV</a></li>
    <li><a href="{{ route('mentions') }}" class="text-nova-muted hover:text-nova-red">Mentions légales</a></li>
    <li><a href="{{ route('contact') }}" class="text-nova-muted hover:text-nova-red">Contact</a></li>
</ul>
            </div>

            <!-- Newsletter -->
            <div>
                <h3 class="font-display text-sm text-nova-white uppercase tracking-wide mb-4">Newsletter</h3>
                <p class="text-sm text-nova-muted mb-3">Sois informé des nouveautés et promos en avant-première.</p>
                <form method="POST" action="#" class="flex">
                    <input type="email" placeholder="Ton email" class="flex-1 bg-nova-black border-nova-line text-nova-white placeholder-nova-muted text-sm focus:ring-nova-red focus:border-nova-red">
                    <button type="submit" class="bg-nova-red text-nova-white px-4 text-sm hover:bg-nova-redDark">
                        OK
                    </button>
                </form>

                <div class="flex gap-4 mt-6">
                    <a href="#" class="text-nova-muted hover:text-nova-red" aria-label="Instagram">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="text-nova-muted hover:text-nova-red" aria-label="TikTok">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/></svg>
                    </a>
                </div>
            </div>

        </div>

        <div class="border-t border-nova-line mt-10 pt-6 flex flex-col sm:flex-row justify-between items-center gap-2">
            <p class="text-xs text-nova-muted">&copy; {{ date('Y') }} NovaStyle. Tous droits réservés.</p>
            <p class="text-xs text-nova-muted">Projet réalisé dans le cadre du titre professionnel DWWM.</p>
        </div>

    </div>
</footer>