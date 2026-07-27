<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            Politique de Confidentialité
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="card-nova p-6">
                <p class="text-xs text-nova-muted mb-6">Dernière mise à jour : {{ date('d/m/Y') }} — Conforme au RGPD (Règlement Général sur la Protection des Données)</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">1. Responsable du traitement</h3>
                <div class="text-sm text-nova-muted space-y-1 mb-6">
                    <p><span class="text-nova-white">Responsable :</span> Sidy Diop</p>
                    <p><span class="text-nova-white">Email :</span> si11didiop@gmail.com</p>
                </div>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">2. Données collectées</h3>
                <div class="text-sm text-nova-muted mb-6">
                    <p class="mb-2">Lors de l'utilisation de NovaStyle, nous collectons les données suivantes :</p>
                    <ul class="space-y-1 list-none">
                        <li class="flex gap-2"><span class="text-nova-red">→</span> Nom et prénom</li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> Adresse email</li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> Adresse de livraison</li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> Historique des commandes</li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> Données de connexion (adresse IP, navigateur)</li>
                    </ul>
                    <p class="mt-3"><span class="text-nova-white">Nous ne collectons pas :</span> données bancaires (traitées directement par Stripe), données de localisation précise.</p>
                </div>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">3. Finalités du traitement</h3>
                <div class="text-sm text-nova-muted mb-6">
                    <ul class="space-y-1">
                        <li class="flex gap-2"><span class="text-nova-red">→</span> Gestion des commandes et de la livraison</li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> Envoi des confirmations de commande par email</li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> Gestion du compte client</li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> Respect des obligations légales</li>
                    </ul>
                </div>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">4. Base légale</h3>
                <p class="text-sm text-nova-muted mb-6">Le traitement de vos données est basé sur l'exécution du contrat (traitement des commandes) et le respect des obligations légales.</p>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">5. Durée de conservation</h3>
                <div class="text-sm text-nova-muted mb-6">
                    <ul class="space-y-1">
                        <li class="flex gap-2"><span class="text-nova-red">→</span> <span><span class="text-nova-white">Données de compte :</span> conservées tant que le compte est actif</span></li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> <span><span class="text-nova-white">Données de commande :</span> 10 ans (obligation légale comptable)</span></li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> <span><span class="text-nova-white">Données de connexion :</span> 12 mois maximum</span></li>
                    </ul>
                </div>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">6. Vos droits (RGPD)</h3>
                <div class="text-sm text-nova-muted mb-6">
                    <p class="mb-2">Conformément au RGPD, vous disposez des droits suivants :</p>
                    <ul class="space-y-1">
                        <li class="flex gap-2"><span class="text-nova-red">→</span> <span><span class="text-nova-white">Droit d'accès :</span> obtenir une copie de vos données</span></li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> <span><span class="text-nova-white">Droit de rectification :</span> corriger vos données inexactes</span></li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> <span><span class="text-nova-white">Droit à l'effacement :</span> supprimer vos données ("droit à l'oubli")</span></li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> <span><span class="text-nova-white">Droit à la portabilité :</span> recevoir vos données dans un format lisible</span></li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> <span><span class="text-nova-white">Droit d'opposition :</span> vous opposer au traitement de vos données</span></li>
                    </ul>
                    <p class="mt-3">Pour exercer ces droits, contactez-nous via la <a href="{{ route('contact') }}" class="text-nova-red hover:underline">page contact</a> ou à l'adresse : si11didiop@gmail.com</p>
                    <p class="mt-2">Vous avez également le droit de déposer une réclamation auprès de la <span class="text-nova-white">CNIL</span> : <a href="https://www.cnil.fr" target="_blank" class="text-nova-red hover:underline">www.cnil.fr</a></p>
                </div>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">7. Sous-traitants</h3>
                <div class="text-sm text-nova-muted mb-6">
                    <p class="mb-2">Nous faisons appel aux sous-traitants suivants, chacun disposant de sa propre politique de confidentialité :</p>
                    <ul class="space-y-1">
                        <li class="flex gap-2"><span class="text-nova-red">→</span> <span><span class="text-nova-white">Stripe</span> — paiement en ligne (stripe.com/fr/privacy)</span></li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> <span><span class="text-nova-white">Railway</span> — hébergement (railway.app/legal/privacy)</span></li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> <span><span class="text-nova-white">Cloudinary</span> — stockage d'images (cloudinary.com/privacy)</span></li>
                        <li class="flex gap-2"><span class="text-nova-red">→</span> <span><span class="text-nova-white">Resend</span> — envoi d'emails (resend.com/legal/privacy-policy)</span></li>
                    </ul>
                </div>

                <h3 class="font-display text-lg text-nova-white mb-3 tracking-wide">8. Cookies</h3>
                <p class="text-sm text-nova-muted">NovaStyle utilise uniquement des cookies de session nécessaires au fonctionnement du site (maintien de la connexion, panier). Ces cookies ne nécessitent pas de consentement selon les lignes directrices de la CNIL car ils sont strictement nécessaires au service.</p>
            </div>

        </div>
    </div>
</x-app-layout>