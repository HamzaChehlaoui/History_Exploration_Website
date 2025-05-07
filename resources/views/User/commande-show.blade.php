
@extends('visiteur.master')
@section('content')
    <x-slot name="header">
        <h2 class="font-serif text-xl text-amber-800 leading-tight border-b-2 border-amber-700 pb-2 mt-4">
            @if (isset($commande))
                {{ __('Détails de la Commande') }} №{{ $commande->id }}
            @elseif (isset($commandes))
                {{ __('Mes Commandes') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-[4rem]">
            <div class="bg-amber-50 overflow-hidden border-2 border-amber-800 shadow-lg sm:rounded-lg">
                <div class="p-8 bg-[url('/img/parchment-bg.jpg')] bg-cover border-b border-amber-700">

                    @if (isset($commande))
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-1 bg-amber-700 mr-4"></div>
                            <h3 class="text-lg font-serif font-bold text-amber-900">{{ __('Informations de la Commande') }}</h3>
                            <div class="w-16 h-1 bg-amber-700 ml-4"></div>
                        </div>

                        <div class="bg-amber-50/80 p-6 border border-amber-700 rounded-md mb-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <p class="mb-2 flex items-baseline">
                                    <span class="font-serif font-bold text-amber-900 mr-2">{{ __('Date de la commande') }}:</span>
                                    <span class="italic">{{ $commande->date_commande }}</span>
                                </p>
                                <p class="mb-2 flex items-baseline">
                                    <span class="font-serif font-bold text-amber-900 mr-2">{{ __('Nom') }}:</span>
                                    <span class="italic">{{ $commande->first_name }} {{ $commande->last_name }}</span>
                                </p>
                                <p class="mb-2 flex items-baseline">
                                    <span class="font-serif font-bold text-amber-900 mr-2">{{ __('Email') }}:</span>
                                    <span class="italic">{{ $commande->email }}</span>
                                </p>
                                @if ($commande->phone)
                                    <p class="mb-2 flex items-baseline">
                                        <span class="font-serif font-bold text-amber-900 mr-2">{{ __('Téléphone') }}:</span>
                                        <span class="italic">{{ $commande->phone }}</span>
                                    </p>
                                @endif
                                <p class="mb-2 flex items-baseline col-span-full">
                                    <span class="font-serif font-bold text-amber-900 mr-2">{{ __('Adresse de livraison') }}:</span>
                                    <span class="italic">{{ $commande->shipping_address }}, {{ $commande->shipping_city }}, {{ $commande->shipping_country }}</span>
                                </p>
                            </div>

                            <div class="border-t-2 border-amber-700/30 my-4 pt-4">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <p class="mb-2 flex items-baseline">
                                        <span class="font-serif font-bold text-amber-900 mr-2">{{ __('Frais de livraison') }}:</span>
                                        <span class="italic">{{ $commande->shipping_cost }}</span>
                                    </p>
                                    <p class="mb-2 flex items-baseline">
                                        <span class="font-serif font-bold text-amber-900 mr-2">{{ __('Taxe') }}:</span>
                                        <span class="italic">{{ $commande->tax }}</span>
                                    </p>
                                    <p class="mb-2 flex items-baseline font-bold">
                                        <span class="font-serif text-amber-900 mr-2">{{ __('Prix Total') }}:</span>
                                        <span class="text-lg">{{ $commande->total_price }}</span>
                                    </p>
                                </div>
                            </div>

                            @if ($commande->notes)
                                <div class="mt-4 p-3 bg-amber-100 border border-amber-300 rounded">
                                    <p class="mb-2 italic text-amber-800">
                                        <span class="font-serif not-italic font-bold text-amber-900 mr-2">{{ __('Notes') }}:</span>
                                        {{ $commande->notes }}
                                    </p>
                                </div>
                            @endif
                        </div>

                        <div class="flex items-center mt-8 mb-6">
                            <div class="w-16 h-1 bg-amber-700 mr-4"></div>
                            <h3 class="text-lg font-serif font-bold text-amber-900">{{ __('Produits de la Commande') }}</h3>
                            <div class="w-16 h-1 bg-amber-700 ml-4"></div>
                        </div>

                        @if ($commande->produits->isEmpty())
                            <p class="italic text-amber-800 text-center p-4">{{ __('Aucun produit dans cette commande.') }}</p>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full border-collapse">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left font-serif text-sm font-bold text-amber-900 uppercase tracking-wider border-b-2 border-amber-700">
                                                {{ __('Nom du Produit') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-center font-serif text-sm font-bold text-amber-900 uppercase tracking-wider border-b-2 border-amber-700">
                                                {{ __('Quantité') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-right font-serif text-sm font-bold text-amber-900 uppercase tracking-wider border-b-2 border-amber-700">
                                                {{ __('Prix Unitaire') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-right font-serif text-sm font-bold text-amber-900 uppercase tracking-wider border-b-2 border-amber-700">
                                                {{ __('Sous-total') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($commande->produits as $produit)
                                            <tr class="hover:bg-amber-100/60">
                                                <td class="px-6 py-4 whitespace-normal border-b border-amber-200">
                                                    <span class="font-medium">{{ $produit->nom }}</span>
                                                </td>
                                                <td class="px-6 py-4 text-center border-b border-amber-200">
                                                    {{ $produit->pivot->quantite }}
                                                </td>
                                                <td class="px-6 py-4 text-right border-b border-amber-200">
                                                    {{ $produit->pivot->prix_unitaire }}
                                                </td>
                                                <td class="px-6 py-4 text-right font-medium border-b border-amber-200">
                                                    {{ $produit->pivot->quantite * $produit->pivot->prix_unitaire }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @elseif (isset($commandes))
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-1 bg-amber-700 mr-4"></div>
                            <h3 class="text-lg font-serif font-bold text-amber-900">{{ __('Liste de Mes Commandes') }}</h3>
                            <div class="w-16 h-1 bg-amber-700 ml-4"></div>
                        </div>

                        @if ($commandes->isEmpty())
                            <p class="italic text-amber-800 text-center p-4 bg-amber-50/80 border border-amber-300 rounded-md">
                                {{ __('Vous n\'avez passé aucune commande pour le moment.') }}
                            </p>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full border-collapse">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left font-serif text-sm font-bold text-amber-900 uppercase tracking-wider border-b-2 border-amber-700">
                                                {{ __('Date de la commande') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left font-serif text-sm font-bold text-amber-900 uppercase tracking-wider border-b-2 border-amber-700">
                                                {{ __('Adresse de livraison') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-right font-serif text-sm font-bold text-amber-900 uppercase tracking-wider border-b-2 border-amber-700">
                                                {{ __('Prix Total') }}
                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($commandes as $commandeItem)
                                            <tr class="hover:bg-amber-100/60">
                                                <td class="px-6 py-4 whitespace-nowrap border-b border-amber-200">
                                                    {{ $commandeItem->date_commande }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-normal border-b border-amber-200">
                                                    {{ $commandeItem->shipping_address }}, {{ $commandeItem->shipping_city }}, {{ $commandeItem->shipping_country }}
                                                </td>
                                                <td class="px-6 py-4 text-right whitespace-nowrap border-b border-amber-200 font-medium">
                                                    {{ $commandeItem->total_price }}
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @else
                        <p class="italic text-amber-800 text-center p-4 bg-amber-50/80 border border-amber-300 rounded-md">
                            {{ __('Une erreur s\'est produite lors du chargement des commandes.') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Add decorative elements at the bottom of the page --}}
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4 mb-8">
        <div class="flex justify-center">
            <div class="w-1/3 h-px bg-gradient-to-r from-transparent via-amber-700 to-transparent"></div>
        </div>
        <div class="text-center text-amber-800 italic text-sm mt-2">
            &mdash; {{ __('Document Officiel') }} &mdash;
        </div>
    </div>
@endsection

