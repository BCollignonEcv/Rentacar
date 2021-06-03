<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reserver un vehicule') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <div>
                    <form action="{{ route('searchVehicules') }}" method="post">
                    @csrf
                        @if (isset($data->typeVehicules))
                            <select name="typeVehicule" id="">
                                <option value="">Type de voiture</option>
                                    @foreach ($data->typeVehicules as $typeVehicule)
                                        <option value="{{ $typeVehicule->id_typeVehicule }}">{{ $typeVehicule->nom_typeVehicule }}</option>
                                    @endforeach
                            </select>
                        @endif
                        @if (isset($data->typeBoites))
                            <select name="typeBoite" id="">
                                <option value="">Type de boite de vitesse</option>
                                    @foreach ($data->typeBoites as $typeBoite)
                                        <option value="{{ $typeBoite->id_typeBoite }}">{{ $typeBoite->nom_typeBoite }}</option>
                                    @endforeach
                            </select>
                        @endif
                        @if (isset($data->typeCarburants))
                            <select name="typeCarburant" id="">
                                <option value="">Type de carburant</option>
                                    @foreach ($data->typeCarburants as $typeCarburant)
                                        <option value="{{ $typeCarburant->id_typeCarburant }}">{{ $typeCarburant->nom_typeCarburant }}</option>
                                    @endforeach
                            </select>
                        @endif
                        <label for="nbPlace">Nombre de place minimum :</label>
                        <input type="number" id="nbPlace" name="nbPlace" min="1" max="24" value="1">
                        <!-- Date de début de reservation -->
                        <!-- <div class="mt-4 col-span-2">
                            <x-label for="dateBegin" :value="__('Date de début de reservation')" />
                            <x-input id="dateBegin" class="block mt-1 w-full" type="date" name="dateBegin" :value="old('dateBegin')" min="Date()" required/>
                        </div> -->
                        <!-- Date de fin de reservation -->
                        <!-- <div class="mt-4 col-span-2">
                            <x-label for="dateEnd" :value="__('Date de fin de reservation')" />
                            <x-input id="dateEnd" class="block mt-1 w-full" type="date" name="dateEnd" :value="old('dateEnd')" min="Date()" required />
                        </div> -->

                        <input style="background-color: #1c959e; padding: 8px 16px; border-radius: 8px;" type="submit" value="Rechercher">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
