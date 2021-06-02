<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $vehicule->nom }}
        </h2>
        <a href="{{ route('vehicules') }}">
            <button>Retour à la liste des vehicules</button>
        </a>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <img src="{{ $vehicule->img }}" alt="" srcset="">
                    <span>{{ $vehicule->nom }}</span>
                    <span>{{ $vehicule->tarif }}</span>
                    <span>{{ $vehicule->annee }}</span>
                    <span>{{ $vehicule->nb_place }}</span>
                    <span>{{ $vehicule->marque->nom }}</span>
                    <span>{{ $vehicule->typeVehicule->nom }}</span>
                    <span>{{ $vehicule->typeBoite->nom }}</span>
                    <span>{{ $vehicule->typeCarburant->nom }}</span>
                    <span>{{ $vehicule->age_minimum }}</span>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
