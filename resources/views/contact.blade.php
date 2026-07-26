<x-app-layout>
    <x-slot name="header">
        <h2 class="font-display text-3xl text-nova-white tracking-wide">
            Contact
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="bg-nova-surface border border-green-600 text-green-500 px-4 py-3 mb-6 uppercase text-sm tracking-wide">
                    {{ session('success') }}
                </div>
            @endif

            <div class="card-nova p-6 mb-6">
                <p class="text-nova-muted text-sm">
                    Une question sur ta commande, un problème ou simplement envie de nous parler ?
                    Remplis le formulaire ci-dessous et on te répondra dans les plus brefs délais.
                </p>
            </div>

            <form method="POST" action="{{ route('contact.store') }}" class="card-nova p-6 space-y-4">
                @csrf

                <div>
                    <label class="block text-sm text-nova-muted uppercase tracking-wide mb-1">Nom</label>
                    <input type="text" name="name" value="{{ old('name', auth()->user()?->name) }}" class="w-full bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red" required>
                    @error('name')<p class="text-nova-red text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm text-nova-muted uppercase tracking-wide mb-1">Email</label>
                    <input type="email" name="email" value="{{ old('email', auth()->user()?->email) }}" class="w-full bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red" required>
                    @error('email')<p class="text-nova-red text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm text-nova-muted uppercase tracking-wide mb-1">Sujet</label>
                    <select name="subject" class="w-full bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red" required>
                        <option value="">— Choisir un sujet —</option>
                        <option value="Suivi de commande" @selected(old('subject') === 'Suivi de commande')>Suivi de commande</option>
                        <option value="Retour / remboursement" @selected(old('subject') === 'Retour / remboursement')>Retour / remboursement</option>
                        <option value="Problème technique" @selected(old('subject') === 'Problème technique')>Problème technique</option>
                        <option value="Question produit" @selected(old('subject') === 'Question produit')>Question produit</option>
                        <option value="Autre" @selected(old('subject') === 'Autre')>Autre</option>
                    </select>
                    @error('subject')<p class="text-nova-red text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm text-nova-muted uppercase tracking-wide mb-1">Message</label>
                    <textarea name="message" rows="5" class="w-full bg-nova-black border-nova-line text-nova-white focus:ring-nova-red focus:border-nova-red" required>{{ old('message') }}</textarea>
                    @error('message')<p class="text-nova-red text-sm mt-1">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="btn-nova w-full">
                    Envoyer le message
                </button>
            </form>

        </div>
    </div>
</x-app-layout>