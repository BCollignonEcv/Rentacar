<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $data->vehicule->nom }}
        </h2>
        <a href="{{ route('vehicules') }}">
            <button>Retour à la liste des vehicules</button>
        </a>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-2 gap-6">
                    <img src="{{ $data->vehicule->img }}" alt="" srcset="">
                    <div>
                        <p class="text-sm text-gray-500">
                            <b>Nom du véhicule : </b> {{ $data->vehicule->nom }}
                        </p>
                        <p class="text-sm text-gray-500">
                            <b>Numéro de série du véhicule : </b>{{ $data->vehicule->nb_serie }}
                        </p>
                        <p class="text-sm text-gray-500">
                            <b>Tarif journalier : </b>{{ $data->vehicule->tarif }}
                        </p>
                        <p class="text-sm text-gray-500">
                            <b>Année : </b>{{ $data->vehicule->annee }}
                        </p>
                        <p class="text-sm text-gray-500">
                            <b>Nombre de place : </b>{{ $data->vehicule->nb_place }}
                        </p>
                        <p class="text-sm text-gray-500">
                            <b>Marque du véhicule : </b>{{ $data->vehicule->marque->nom_marque }}
                        </p>
                        <p class="text-sm text-gray-500">
                            <b>Type de véhicule : </b>{{ $data->vehicule->typeVehicule->nom_typeVehicule }}
                        </p>
                        <p class="text-sm text-gray-500">
                            <b>Type de boite de vitesse : </b>{{ $data->vehicule->typeBoite->nom_typeBoite }}
                        </p>
                        <p class="text-sm text-gray-500">
                            <b>Type de carburant : </b>{{ $data->vehicule->typeCarburant->nom_typeCarburant }}
                        </p>
                        <p class="text-sm text-gray-500">
                            <b>Age minimum légal : </b>{{ $data->vehicule->age_minimum }}
                        </p>
                    </div>
                    @if ( Auth::user()->type === 'admin')
                    <div>
                        <div class="w-1/2 text-right">
                            <a href="{{ route('createControleConformite', ['id_vehicule' => $data->vehicule->id_vehicule]) }}" style="background-color: #1c959e; padding: 8px 16px; border-radius: 8px;"><small>Ajouter un controle de conformité</small></a>
                        </div>
                        <h5>Dernier controle de conformité</h5>
                        @if (isset($data->controleConformites))
                            @foreach ($data->controleConformites as $controleConformite)
                                <a href="">
                                    <p class="text-sm text-gray-500">
                                        {{ $controleConformite->created_at }} -> 
                                        @if ($controleConformite->statut === 1)
                                            <b style="color: green">
                                                Ok
                                            </b>
                                        @else
                                            <b style="color: red">
                                                Not OK
                                            </b>
                                        @endif<b>
                                        </b>
                                    </p>
                                </a>
                            @endforeach
                        @else
                            <p class="text-sm text-gray-500">
                                <b style="color: red">
                                Ce vehicule n'a jamais eu de controle de confirmité
                                </b>
                            </p>
                        @endif

                    </div>
                    <div>
                        <h5>Dernier controle après reservation</h5>
                        @if (isset($data->controleAP))
                            <p class="text-sm text-gray-500">
                                @if ($data->controleAP->noteGlobale > 5)
                                    <b style="color: green">
                                        Note globale : {{ $data->controleAP->noteGlobale }}/10
                                    </b>
                                @else
                                    <b style="color: red">
                                        Note globale : {{ $data->controleAP->noteGlobale }}/10
                                    </b>
                                @endif
                            </p>
                            <p class="text-sm text-gray-500">
                                Etat des pneus :
                                    @if ($data->controleAP->etat_pneu > 5)
                                        <b style="color: green">
                                    @else
                                        <b style="color: red">
                                    @endif
                                            {{ $data->controleAP->etat_pneu }}/10
                                        </b>
                            </p>
                            <p class="text-sm text-gray-500">
                                Etat des freins :
                                    @if ($data->controleAP->etat_frein > 5)
                                        <b style="color: green">
                                    @else
                                        <b style="color: red">
                                    @endif
                                            {{ $data->controleAP->etat_frein }}/10
                                        </b>
                            </p>
                            <p class="text-sm text-gray-500">
                                Etat du moteur :
                                    @if ($data->controleAP->etat_moteur > 5)
                                        <b style="color: green">
                                    @else
                                        <b style="color: red">
                                    @endif
                                            {{ $data->controleAP->etat_moteur }}/10
                                        </b>
                            </p>
                            <p class="text-sm text-gray-500">
                                Etat des feux :
                                    @if ($data->controleAP->etat_feu > 5)
                                        <b style="color: green">
                                    @else
                                        <b style="color: red">
                                    @endif
                                            {{ $data->controleAP->etat_feu }}/10
                                        </b>
                            </p>
                            <p class="text-sm text-gray-500">
                                Etat de la carrosserie :
                                    @if ($data->controleAP->etat_carrosserie > 5)
                                        <b style="color: green">
                                    @else
                                        <b style="color: red">
                                    @endif
                                            {{ $data->controleAP->etat_carrosserie }}/10
                                        </b>
                            </p>
                            <p class="text-sm text-gray-500">
                                Etat de la peinture :
                                    @if ($data->controleAP->etat_peinture > 5)
                                        <b style="color: green">
                                    @else
                                        <b style="color: red">
                                    @endif
                                            {{ $data->controleAP->etat_peinture }}/10
                                        </b>
                            </p>
                            <p class="text-sm text-gray-500">
                                Etat de l'interieur' :
                                    @if ($data->controleAP->etat_interieur > 5)
                                        <b style="color: green">
                                    @else
                                        <b style="color: red">
                                    @endif
                                            {{ $data->controleAP->etat_interieur }}/10
                                        </b>
                            </p>
                            <p class="text-sm text-gray-500">
                                Etat des retroviseurs :
                                    @if ($data->controleAP->etat_retroviseur > 5)
                                        <b style="color: green">
                                    @else
                                        <b style="color: red">
                                    @endif
                                            {{ $data->controleAP->etat_retroviseur }}/10
                                        </b>
                            </p>
                            
                        @else
                            <p class="text-sm text-gray-500">
                                <b style="color: red">
                                Ce vehicule n'a jamais eu de controle d'apres reservation
                                </b>
                            </p>
                        @endif
                    </div>
                    <a href="/vehicule/edit/{{ $data->vehicule->id_vehicule }}" style="background-color: #1c959e; padding: 8px 16px; border-radius: 8px;">Modifier</a>
                    <a href="/vehicule/delete/{{ $data->vehicule->id_vehicule }}" style="background-color: #1c959e; padding: 8px 16px; border-radius: 8px;">Supprimer</a>
                    @else
                        @include('form/formReservation')
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
