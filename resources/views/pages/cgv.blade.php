<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            Conditions Générales de Vente
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="card-nova p-6">
                <p class="text-xs text-nova-muted mb-4">Dernière mise à jour : {{ date('d/m/Y') }}</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">Article 1 — Objet</h3>
                <p class="text-sm text-nova-muted mb-4">Les présentes Conditions Générales de Vente (CGV) régissent les relations contractuelles entre NovaStyle et tout client souhaitant effectuer un achat sur le site novastyle.fr.</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">Article 2 — Produits</h3>
                <p class="text-sm text-nova-muted mb-4">Les produits proposés sont ceux qui figurent sur le site au moment de la consultation par l'acheteur. Les photographies et descriptions sont les plus fidèles possible mais ne peuvent assurer une similitude parfaite avec le produit physique.</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">Article 3 — Prix</h3>
                <p class="text-sm text-nova-muted mb-4">Les prix sont indiqués en euros toutes taxes comprises (TTC). NovaStyle se réserve le droit de modifier ses prix à tout moment, étant entendu que le prix applicable à la commande est celui en vigueur au moment de la validation de la commande.</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">Article 4 — Commande</h3>
                <p class="text-sm text-nova-muted mb-4">Toute commande vaut acceptation des prix et descriptions des produits disponibles à la vente. La commande est définitive après confirmation du paiement. NovaStyle se réserve le droit d'annuler ou de refuser toute commande d'un client avec lequel il existerait un litige.</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">Article 5 — Paiement</h3>
                <p class="text-sm text-nova-muted mb-4">Le paiement s'effectue en ligne par carte bancaire via la plateforme sécurisée Stripe. Les données bancaires sont cryptées et ne transitent pas par nos serveurs.</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">Article 6 — Livraison</h3>
                <p class="text-sm text-nova-muted mb-4">Les commandes sont expédiées dans les 48h ouvrées suivant la confirmation du paiement. Les délais de livraison sont indiqués sur notre page <a href="{{ route('livraison') }}" class="text-nova-red hover:underline">Livraison & Retours</a>.</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">Article 7 — Droit de rétractation</h3>
                <p class="text-sm text-nova-muted mb-4">Conformément à la loi, vous disposez d'un délai de 14 jours à compter de la réception de votre commande pour exercer votre droit de rétractation, sans avoir à justifier de motifs ni à payer de pénalités.</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">Article 8 — Litiges</h3>
                <p class="text-sm text-nova-muted">En cas de litige, une solution amiable sera recherchée avant toute action judiciaire. À défaut, les tribunaux français seront seuls compétents.</p>
            </div>

        </div>
    </div>
</x-app-layout>