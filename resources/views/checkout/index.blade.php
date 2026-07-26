<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            Valider la commande
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="card-nova p-6 mb-6">
                <h3 class="font-display text-lg text-nova-white mb-4 tracking-wide">Récapitulatif</h3>
                <div class="divide-y divide-nova-line">
                    @foreach ($cart->items as $item)
                        <div class="flex justify-between py-2 text-sm text-nova-muted">
                            <span>{{ $item->product->name }} @if($item->size)({{ $item->size->size }})@endif × {{ $item->quantity }}</span>
                            <span class="font-medium text-nova-white">{{ number_format($item->subtotal(), 2) }} €</span>
                        </div>
                    @endforeach
                </div>
                <div class="flex justify-between pt-4 border-t border-nova-line mt-2 font-display text-xl text-nova-white tracking-wide">
                    <span>Total</span>
                    <span>{{ number_format($cart->total(), 2) }} €</span>
                </div>
            </div>

            <form method="POST" action="{{ route('checkout.store') }}" class="card-nova p-6 space-y-4">
                @csrf

                <h3 class="font-display text-lg text-nova-white tracking-wide">Adresse de livraison</h3>

                <div>
                    <label class="block text-sm text-nova-muted uppercase tracking-wide mb-1">Rue et numéro</label>
                    <input type="text" name="address_street" value="{{ old('address_street') }}" placeholder="12 rue de la Paix" class="w-full bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red" required>
                    @error('address_street')<p class="text-nova-red text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-nova-muted uppercase tracking-wide mb-1">Code postal</label>
                        <input type="text" name="address_postal" value="{{ old('address_postal') }}" placeholder="75001" class="w-full bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red" required>
                        @error('address_postal')<p class="text-nova-red text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="block text-sm text-nova-muted uppercase tracking-wide mb-1">Ville</label>
                        <input type="text" name="address_city" value="{{ old('address_city') }}" placeholder="Paris" class="w-full bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red" required>
                        @error('address_city')<p class="text-nova-red text-sm mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div>
                    <label class="block text-sm text-nova-muted uppercase tracking-wide mb-1">Pays</label>
                    <select name="address_country" class="w-full bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red">
                        <option value="France" @selected(old('address_country') === 'France')>France</option>
                        <option value="Belgique" @selected(old('address_country') === 'Belgique')>Belgique</option>
                        <option value="Suisse" @selected(old('address_country') === 'Suisse')>Suisse</option>
                        <option value="Luxembourg" @selected(old('address_country') === 'Luxembourg')>Luxembourg</option>
                        <option value="Sénégal" @selected(old('address_country') === 'Sénégal')>Sénégal</option>
                        <option value="Maroc" @selected(old('address_country') === 'Maroc')>Maroc</option>
                        <option value="Autre" @selected(old('address_country') === 'Autre')>Autre</option>
                    </select>
                    @error('address_country')<p class="text-nova-red text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="btn-nova mt-2 w-full">
                    Confirmer la commande
                </button>
            </form>

        </div>
    </div>
</x-app-layout>