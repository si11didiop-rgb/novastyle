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

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">1. Éditeur du site</h3>
                <div class="text-sm text-nova-muted space-y-1 mb-6">
                    <p><span class="text-nova-white">Nom :</span> Sidy Diop</p>
                    <p><span class="text-nova-white">Statut :</span> Particulier</p>
                    <p><span class="text-nova-white">Email :</span> si11didiop@gmail.com</p>
                    <p><span class="text-nova-white">Site web :</span> novastyle-production.up.railway.app</p>
                </div>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">2. Hébergement</h3>
                <div class="text-sm text-nova-muted space-y-1 mb-6">
                    <p><span class="text-nova-white">Hébergeur :</span> Railway (Railway Corp.)</p>
                    <p><span class="text-nova-white">Adresse :</span> 340 S Lemon Ave #4133, Walnut, CA 91789, États-Unis</p>
                    <p><span class="text-nova-white">Site :</span> https://railway.app</p>
                </div>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">3. Stockage des images</h3>
                <div class="text-sm text-nova-muted space-y-1 mb-6">
                    <p><span class="text-nova-white">Service :</span> Cloudinary (Cloudinary Ltd.)</p>
                    <p><span class="text-nova-white">Site :</span> https://cloudinary.com</p>
                    <p>Les images des produits sont hébergées sur les serveurs de Cloudinary.</p>
                </div>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">4. Paiement</h3>
                <div class="text-sm text-nova-muted space-y-1 mb-6">
                    <p><span class="text-nova-white">Prestataire :</span> Stripe (Stripe Inc.)</p>
                    <p><span class="text-nova-white">Site :</span> https://stripe.com</p>
                    <p>Les paiements sont traités par Stripe. NovaStyle ne stocke aucune donnée bancaire.</p>
                </div>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">5. Propriété intellectuelle</h3>
                <p class="text-sm text-nova-muted mb-6">L'ensemble des contenus présents sur le site NovaStyle (textes, images, logos, graphismes) sont la propriété de Sidy Diop. Toute reproduction est interdite sans autorisation préalable.</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">6. Données personnelles</h3>
                <p class="text-sm text-nova-muted mb-3">NovaStyle collecte uniquement les données nécessaires au traitement des commandes. Pour plus d'informations, consultez notre <a href="{{ route('privacy') }}" class="text-nova-red hover:underline">Politique de confidentialité</a>.</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">7. Cookies</h3>
                <p class="text-sm text-nova-muted mb-6">Le site utilise uniquement des cookies de session nécessaires au bon fonctionnement (panier, authentification). Aucun cookie publicitaire ou de tracking n'est utilisé.</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">8. Litiges</h3>
                <p class="text-sm text-nova-muted">En cas de litige, une solution amiable sera recherchée avant toute action judiciaire. Les tribunaux français sont seuls compétents.</p>
            </div>

        </div>
    </div>
</x-app-layout>