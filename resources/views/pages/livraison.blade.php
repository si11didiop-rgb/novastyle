<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            Livraison & Retours
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="card-nova p-6">
                <h3 class="font-display text-xl text-nova-white mb-4 tracking-wide">Délais de livraison</h3>
                <div class="space-y-3 text-sm text-nova-muted">
                    <div class="flex justify-between border-b border-nova-line pb-2">
                        <span>France métropolitaine</span>
                        <span class="text-nova-white">3 à 5 jours ouvrés</span>
                    </div>
                    <div class="flex justify-between border-b border-nova-line pb-2">
                        <span>Europe</span>
                        <span class="text-nova-white">5 à 10 jours ouvrés</span>
                    </div>
                    <div class="flex justify-between pb-2">
                        <span>International</span>
                        <span class="text-nova-white">10 à 20 jours ouvrés</span>
                    </div>
                </div>
            </div>

            <div class="card-nova p-6">
                <h3 class="font-display text-xl text-nova-white mb-4 tracking-wide">Frais de livraison</h3>
                <div class="space-y-3 text-sm text-nova-muted">
                    <div class="flex justify-between border-b border-nova-line pb-2">
                        <span>Commande inférieure à 50€</span>
                        <span class="text-nova-white">4,99 €</span>
                    </div>
                    <div class="flex justify-between pb-2">
                        <span>Commande supérieure à 50€</span>
                        <span class="text-nova-red font-medium">Gratuit</span>
                    </div>
                </div>
            </div>

            <div class="card-nova p-6">
                <h3 class="font-display text-xl text-nova-white mb-4 tracking-wide">Politique de retours</h3>
                <div class="space-y-3 text-sm text-nova-muted">
                    <p>Tu disposes de <span class="text-nova-white">14 jours</span> à compter de la réception de ta commande pour nous retourner un article.</p>
                    <p>Les articles retournés doivent être dans leur état d'origine, non portés, non lavés, avec leurs étiquettes d'origine.</p>
                    <p>Les frais de retour sont à la charge du client, sauf en cas d'erreur de notre part ou d'article défectueux.</p>
                    <p>Le remboursement sera effectué sous <span class="text-nova-white">5 à 10 jours ouvrés</span> après réception et vérification de l'article.</p>
                </div>
            </div>

            <div class="card-nova p-6">
                <h3 class="font-display text-xl text-nova-white mb-4 tracking-wide">Comment retourner un article ?</h3>
                <ol class="space-y-2 text-sm text-nova-muted list-none">
                    <li class="flex gap-3"><span class="price-tag text-xs px-2 py-1">1</span> Contacte-nous via la <a href="{{ route('contact') }}" class="text-nova-red hover:underline">page contact</a></li>
                    <li class="flex gap-3"><span class="price-tag text-xs px-2 py-1">2</span> Indique ton numéro de commande et le motif du retour</li>
                    <li class="flex gap-3"><span class="price-tag text-xs px-2 py-1">3</span> Renvoie l'article à l'adresse que nous t'aurons communiquée</li>
                    <li class="flex gap-3"><span class="price-tag text-xs px-2 py-1">4</span> Reçois ton remboursement dans les 5 à 10 jours ouvrés</li>
                </ol>
            </div>

        </div>
    </div>
</x-app-layout>