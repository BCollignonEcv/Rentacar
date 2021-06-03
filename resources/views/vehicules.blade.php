<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Vehicules') }}
        </h2>
        @if ( Auth::user()->type === 'admin')
            <a href="{{ route('createVehicule') }}">
                <button>Ajouter un vehicule</button>
            </a>
        @endif
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto grid grid-cols-3 gap-4">
            @foreach ($data->vehicules as $vehicule)
                <a href="/vehicule/{{ $vehicule->id_vehicule }}">
                    <div class="col-span-4">
                        <div class="col-span-4">
                            <img src="{{ $vehicule->img }}" alt="" />
                        </div>
                        <div  class="flex">
                            <div class="flex flex-wrap">
                                <h1 class="flex-auto text-xl font-semibold">
                                    {{ $vehicule->nom }}
                                </h1>
                            </div>
                            <div class="flex items-baseline mt-4 mb-6">
                        </div>
                        
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-app-layout>
