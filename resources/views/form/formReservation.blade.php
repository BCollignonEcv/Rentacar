<form method="POST" action="{{ route('storeReservation') }}">
    @csrf
    <div class="grid grid-cols-3 gap-4">
        <x-input id="id_vehicule" class="block mt-1 w-full" type="hidden" name="id_vehicule" value="{{ $data->vehicule->id_vehicule}}" />
        <x-input id="id_client" class="block mt-1 w-full" type="hidden" name="id_client" value="{{ Auth::user()->id }}" />

        <!-- Date de début de reservation -->
        <div class="mt-4 col-span-2">
            <x-label for="dateBegin" :value="__('Date de début de reservation')" />
            <x-input id="dateBegin" class="block mt-1 w-full" type="date" name="dateBegin" :value="old('dateBegin')" min="Date()" required/>
        </div>
        <!-- Date de fin de reservation -->
        <div class="mt-4 col-span-2">
            <x-label for="dateEnd" :value="__('Date de fin de reservation')" />
            <x-input id="dateEnd" class="block mt-1 w-full" type="date" name="dateEnd" :value="old('dateEnd')" min="Date()" required />
        </div>
    </div>
    <div class="mt-4">
        <x-button class="ml-4">
            {{ __('Reserver') }}
        </x-button>
    </div>
</form>
