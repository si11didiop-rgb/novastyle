<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            Mentions Légales
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="card-nova p-6">
                <p class="text-xs text-nova-muted mb-6">Dernière mise à jour : {{ date('d/m/Y') }}</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">Éditeur du site</h3>
                <div class="text-sm text-nova-muted space-y-1 mb-6">
                    <p><span class="text-nova-white">Nom :</span> NovaStyle</p>
                    <p><span class="text-nova-white">Email :</span> contact@novastyle.fr</p>
                    <p><span class="text-nova-white">Responsable de publication :</span> Sidy Diop</p>
                </div>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">Hébergement</h3>
                <div class="text-sm text-nova-muted space-y-1 mb-6">
                    <p><span class="text-nova-white">Hébergeur :</span> À définir lors du déploiement</p>
                </div>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">Propriété intellectuelle</h3>
                <p class="text-sm text-nova-muted mb-6">L'ensemble des contenus présents sur le site NovaStyle (textes, images, logos, graphismes) sont protégés par le droit d'auteur. Toute reproduction est interdite sans autorisation préalable.</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">Données personnelles</h3>
                <p class="text-sm text-nova-muted mb-3">NovaStyle collecte uniquement les données nécessaires au traitement des commandes (nom, email, adresse de livraison). Ces données ne sont jamais vendues à des tiers.</p>
                <p class="text-sm text-nova-muted mb-6">Conformément au RGPD, vous disposez d'un droit d'accès, de rectification et de suppression de vos données personnelles. Pour exercer ce droit, contactez-nous via la <a href="{{ route('contact') }}" class="text-nova-red hover:underline">page contact</a>.</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">Cookies</h3>
                <p class="text-sm text-nova-muted">Le site utilise des cookies de session nécessaires au bon fonctionnement du panier et de l'authentification. Aucun cookie de tracking publicitaire n'est utilisé.</p>
            </div>

        </div>
    </div>
</x-app-layout>