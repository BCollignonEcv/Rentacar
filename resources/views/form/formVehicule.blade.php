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
            @if (isset($data->vehicule))
                <form method="POST" action="{{ route('updateVehicule', ['id' => $data->vehicule->id_vehicule] ) }}">
            @else
                <form method="POST" action="{{ route('storeVehicule') }}">
            @endif
            @if (isset($data->vehicule->id_vehicule))
                <x-input id="id_vehicule" class="block mt-1 w-full" type="hidden" name="id_vehicule" value="{{ $data->vehicule->id_vehicule}}" />
            @endif
            @csrf
            <div class="grid grid-cols-3 gap-4">
                <!-- Numéro de serie -->
                <div class="mt-4 col-span-3">
                    <x-label for="nbSerie" :value="__('Numéro de serie')" />
                    @if (isset($data->vehicule->nb_serie))
                        <x-input id="nbSerie" class="block mt-1 w-full" type="text" name="nbSerie" value="{{ $data->vehicule->nb_serie }}" required />
                    @else
                        <x-input id="nbSerie" class="block mt-1 w-full" type="text" name="nbSerie" required />
                    @endif
                </div>
                <!-- Nom -->
                <div class="mt-4">
                    <x-label for="nom" :value="__('Nom')" />
                    @if (isset($data->vehicule->nb_serie))
                        <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" value="{{ $data->vehicule->nom }}" required />
                    @else
                        <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" required />
                    @endif
                </div> 

                <!-- Tarif journalier-->
                <div class="mt-4">
                    <x-label for="tarif" :value="__('Tarif journalier')" />
                    @if (isset($data->vehicule->nb_serie))
                        <x-input id="tarif" class="block mt-1 w-full" type="number" name="tarif" min="1" value="{{ $data->vehicule->tarif }}" required />
                    @else
                        <x-input id="tarif" class="block mt-1 w-full" type="number" name="tarif" min="1" required />
                    @endif
                </div>
                <!-- Annee -->
                <div class="mt-4">
                    <x-label for="annee" :value="__('Année')" />
                    @if (isset($data->vehicule->annee))
                        <x-input id="annee" class="block mt-1 w-full" type="number" name="annee" min="1" value="{{ $data->vehicule->annee }}" min="1960" max="2021" value="2021" required />
                    @else
                        <x-input id="annee" class="block mt-1 w-full" type="number" name="annee" :value="old('annee')"  min="1960" max="2021" value="2021" required />
                    @endif
                </div>
                <!-- Nombre de place -->
                <div class="mt-4">
                    <x-label for="nbPlace" :value="__('Nombre de place')" />
                    @if (isset($data->vehicule->annee))
                        <x-input id="nbPlace" class="block mt-1 w-full" type="number" name="nbPlace" min="1" value="{{ $data->vehicule->nb_place }}" min="1" required />
                    @else
                        <x-input id="nbPlace" class="block mt-1 w-full" type="number" name="nbPlace"  min="1" required/>
                    @endif
                </div>
                @if (isset($data->marques))
                <!-- Type de vehicule -->
                    <div class="mt-4">
                        <x-label for="marque" :value="__('Marque du véhicule')" />
                        <select name="marque" id="marque" class="block mt-1 w-full">
                            <option value="" disabled selected>Selectionner...</option>
                                @foreach ($data->marques as $marque)
                                    @if (isset($data->vehicule->id_marque) && $data->vehicule->id_marque === $marque->id_marque)
                                        <option value="{{ $marque->id_marque }}" selected>{{ $marque->nom_marque }}</option>
                                    @else
                                        <option value="{{ $marque->id_marque }}">{{ $marque->nom_marque }}</option>
                                    @endif
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
                                @if (isset($data->vehicule->id_typeVehicule) && $data->vehicule->id_typeVehicule === $typeVehicule->id_typeVehicule)
                                    <option value="{{ $typeVehicule->id_typeVehicule }}" selected>{{ $typeVehicule->nom_typeVehicule }}</option>
                                @else
                                    <option value="{{ $typeVehicule->id_typeVehicule }}">{{ $typeVehicule->nom_typeVehicule }}</option>
                                @endif
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
                                @if (isset($data->vehicule->id_typeBoite) && $data->vehicule->id_typeBoite === $typeBoite->id_typeBoite)
                                    <option value="{{ $typeBoite->id_typeBoite }}" selected>{{ $typeBoite->nom_typeBoite }}</option>
                                @else
                                    <option value="{{ $typeBoite->id_typeBoite }}">{{ $typeBoite->nom_typeBoite }}</option>
                                @endif
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
                                @if (isset($data->vehicule->id_typeCarburant) && $data->vehicule->id_typeCarburant === $typeCarburant->id_typeCarburant)
                                    <option value="{{ $typeCarburant->id_typeCarburant }}" selected>{{ $typeCarburant->nom_typeCarburant }}</option>
                                @else
                                    <option value="{{ $typeCarburant->id_typeCarburant }}">{{ $typeCarburant->nom_typeCarburant }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                @endif
                    <!-- Age minimum legal -->
                    <div class="mt-4">
                        <x-label for="age_minimum" :value="__('Age minimum légale')" />
                        @if (isset($data->vehicule->annee))
                            <x-input id="age_minimum" class="block mt-1 w-full" type="number" name="age_minimum" value="{{ $data->vehicule->age_minimum }}" min="18" required />
                        @else
                            <x-input id="age_minimum" class="block mt-1 w-full" type="number" name="age_minimum" min="18" required />
                        @endif
                    </div>

                    <!-- Image du vehicule -->
                    <div class="mt-4 col-span-3">
                        <x-label for="img" :value="__('Image du vehicule')" />
                        @if (isset($data->vehicule->annee))
                            <x-input id="img" class="block mt-1 w-full" type="text" name="img" value="{{ $data->vehicule->img }}" required placeholder="Veuillez renseigner le lien d'une image"/>
                        @else
                            <x-input id="img" class="block mt-1 w-full" type="text" name="img" required placeholder="Veuillez renseigner le lien d'une image"/>
                        @endif
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
