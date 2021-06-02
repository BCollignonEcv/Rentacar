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
                    <form action="vehicules" method="get">
                    @csrf
                        @if (isset($data->typeVehicules))
                            <select name="" id="">
                                <option value="">Type de voiture</option>
                                    @foreach ($data->typeVehicules as $typeVehicule)
                                        <option value="{{ $typeVehicule->id }}">{{ $typeVehicule->nom_typeVehicule }}</option>
                                    @endforeach                            
                            </select>
                        @endif
                        @if (isset($data->typeBoites))
                            <select name="" id="">
                                <option value="">Type de voiture</option>
                                    @foreach ($data->typeBoites as $typeBoite)
                                        <option value="{{ $typeBoite->id }}">{{ $typeBoite->nom_typeBoite }}</option>
                                    @endforeach                            
                            </select>
                        @endif
                        @if (isset($data->typeCarburants))
                            <select name="" id="">
                                <option value="">Type de voiture</option>
                                    @foreach ($data->typeCarburants as $typeCarburant)
                                        <option value="{{ $typeCarburant->id }}">{{ $typeCarburant->nom_typeCarburant }}</option>
                                    @endforeach                            
                            </select>
                        @endif
                        <br>
                        <label for="min_nbPlace">Nombre de place minimum :</label>
                        <input type="number" id="min_nbPlace" name="min_nbPlace" min="1" max="24" value="1">                        
                        <br>
                        <br>
                        <input type="submit" value="Rechercher">
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
