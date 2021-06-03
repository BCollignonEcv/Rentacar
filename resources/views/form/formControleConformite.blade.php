<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ajouter un controle de conformité
        </h2>
        <a href="{{ route('vehicules') }}">
            <button>Retour à la liste des vehicules</button>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('storeControleConformite') }}">
            @csrf
            <div class="grid grid-cols-3 gap-4">

                <!-- ID vehicule -->
                <x-input id="id_vehicule" class="block mt-1 w-full" type="hidden" name="id_vehicule" value="{{ $data->id_vehicule }}" />

                <!-- Etat des pneus -->
                <div class="mt-4 col-span-3">
                    <x-label for="etatPneu" :value="__('Etat des pneus')" />
                    <x-input id="etatPneu" class="block mt-1 w-full" type="number" name="etatPneu" :value="old('etatPneu')" min="1" max="10" required />
                </div>

                <!-- Etat du moteur -->
                <div class="mt-4 col-span-3">
                    <x-label for="etatMoteur" :value="__('Etat du moteur')" />
                    <x-input id="etatMoteur" class="block mt-1 w-full" type="number" name="etatMoteur" :value="old('etatPneu')" min="1" max="10" required />
                </div>

                <!-- Etat des freins -->
                <div class="mt-4 col-span-3">
                    <x-label for="etatFrein" :value="__('Etat des freins')" />
                    <x-input id="etatFrein" class="block mt-1 w-full" type="number" name="etatFrein" :value="old('etatFrein')" min="1" max="10" required />
                </div>

                <!-- Etat des feux -->
                <div class="mt-4 col-span-3">
                    <x-label for="etatFeu" :value="__('Etat des feux')" />
                    <x-input id="etatFeu" class="block mt-1 w-full" type="number" name="etatFeu" :value="old('etatPneu')" min="1" max="10" required />
                </div>
            </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Enregistrer') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
