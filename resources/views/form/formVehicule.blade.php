<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @if (isset($data->vehicule))
            Editer {{ $data->vehicule->nom }}
        @else
            {{ __('Ajouter un vehicule') }}
        @endif
        </h2>
        <a href="{{ route('vehicules') }}">
            <button>Retour à la liste des vehicules</button>
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('storeVehicule') }}">
            @csrf
            <div class="grid grid-cols-3 gap-4">
                <!-- Numéro de serie -->
                <div class="mt-4 col-span-3">
                    <x-label for="nbSerie" :value="__('Numéro de serie')" />
                    <x-input id="nbSerie" class="block mt-1 w-full" type="text" name="nbSerie" :value="old('nbSerie')" required />
                </div>
                <!-- Nom -->
                <div class="mt-4">
                    <x-label for="nom" :value="__('Nom')" />
                    <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
                </div> 

                <!-- Tarif journalier-->
                <div class="mt-4">
                    <x-label for="tarif" :value="__('Tarif journalier')" />
                    <x-input id="tarif" class="block mt-1 w-full" type="number" name="tarif" :value="old('tarif')" min="1" required />
                </div>
                <!-- Annee -->
                <div class="mt-4">
                    <x-label for="annee" :value="__('Année')" />
                    <x-input id="annee" class="block mt-1 w-full" type="text" name="annee" :value="old('annee')"  min="1960" max="2021" value="2021" required />
                </div>
                <!-- Nombre de place -->
                <div class="mt-4">
                    <x-label for="nbPlace" :value="__('Nombre de place')" />
                    <x-input id="nbPlace" class="block mt-1 w-full" type="text" name="nbPlace" :value="old('nbPlace')" required />
                </div>
                @if (isset($data->marques))
                <!-- Type de vehicule -->
                    <div class="mt-4">
                        <x-label for="marque" :value="__('Marque du véhicule')" />
                        <select name="marque" id="marque" class="block mt-1 w-full">
                            <option value="" disabled selected>Selectionner...</option>
                                @foreach ($data->marques as $marque)
                                    <option value="{{ $marque->id_marque }}">{{ $marque->nom_marque }}</option>
                                @endforeach
                        </select>
                    </div>
                @endif


                @if (isset($data->typeVehicules))
                <!-- Type de vehicule -->
                    <div class="mt-4">
                        <x-label for="typeVehicule" :value="__('Type de véhicule')" />
                        <select name="typeVehicule" id="typeVehicule" class="block mt-1 w-full">
                            <option value="" disabled selected>Selectionner...</option>
                            @foreach ($data->typeVehicules as $typeVehicule)
                                <option value="{{ $typeVehicule->id_typeVehicule }}">{{ $typeVehicule->nom_typeVehicule }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif


                @if (isset($data->typeBoites))
                <!-- Type de vehicule -->
                    <div class="mt-4">
                        <x-label for="typeBoite" :value="__('Type de boite de vitesse')" />
                        <select name="typeBoite" id="typeBoite" class="block mt-1 w-full">
                            <option value="" disabled selected>Selectionner...</option>
                            @foreach ($data->typeBoites as $typeBoite)
                                <option value="{{ $typeBoite->id_typeBoite }}">{{ $typeBoite->nom_typeBoite }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                @if (isset($data->typeCarburants))
                <!-- Type de vehicule -->
                    <div class="mt-4">
                        <x-label for="typeCarburant" :value="__('Type de carburant')" />
                        <select name="typeCarburant" id="typeCarburant" class="block mt-1 w-full">
                            <option value="" disabled selected>Selectionner...</option>
                            @foreach ($data->typeCarburants as $typeCarburant)
                                <option value="{{ $typeCarburant->id_typeCarburant }}">{{ $typeCarburant->nom_typeCarburant }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif
                    <!-- Age minimum legal -->
                    <div class="mt-4">
                        <x-label for="age_minimum" :value="__('Age minimum légale')" />
                        <x-input id="age_minimum" class="block mt-1 w-full" type="text" name="age_minimum" :value="old('age_minimum')" min="18" required />
                    </div>

                    <!-- Image du vehicule -->
                    <div class="mt-4 col-span-3">
                        <x-label for="img" :value="__('Image du vehicule')" />
                        <x-input id="img" class="block mt-1 w-full" type="text" name="img" :value="old('img')" required placeholder="Veuillez renseigner le lien d'une image"/>
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
