<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehicules') }}
        </h2>
        <a href="{{ route('createVehicule') }}">
                <button>Ajouter un vehicule</button>
            </a>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        @foreach ($data->vehicules as $vehicule)
                            <li>
                                <a href="/vehicule/{{ $vehicule->id_vehicule }}">
                                    <img src="{{ $vehicule->img }}" alt="" srcset="">
                                    <span>{{ $vehicule->nom }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <br>
                    {{ $data->vehicules->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
