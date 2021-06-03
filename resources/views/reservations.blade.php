<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mes réservations') }}
        </h2>
    </x-slot>

    @if (isset($data))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h5>Mes prochaines réservations</h5>
            @if (isset($data->incomingReservations))
                @foreach ($data->incomingReservations as $incomingReservation)
                    <div>
                        <p class="text-sm text-gray-500">
                            Réservation n° : {{ $incomingReservation->id_reservation }}
                        </p>
                        <p class="text-sm text-gray-500">
                            Date de début : {{ $incomingReservation->date_begin }}
                        </p>
                        <p class="text-sm text-gray-500">
                            Date de fin : {{ $incomingReservation->date_end }}
                        </p>
                    </div>
                    <br>
                @endforeach
            @endif
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h5>Historique de réservations</h5>
        </div>
    </div>
    @endif
</x-app-layout>
