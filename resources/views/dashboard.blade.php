<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-900 text-xl font-bold mb-2">Clients</div>
                    <div class="text-3xl font-bold text-blue-600">{{ $totalClients }}</div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-900 text-xl font-bold mb-2">Produits</div>
                    <div class="text-3xl font-bold text-green-600">{{ $totalProducts }}</div>
                    <div class="text-sm text-gray-600">Valeur: {{ number_format($totalStockValue, 2) }} MAD</div>
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <div class="text-gray-900 text-xl font-bold mb-2">Total des Rendez-vous</div>
                    <div class="text-3xl font-bold text-purple-600">{{ $totalRendezVous }}</div>
                </div>
            </div>

            <!-- Today's Appointments -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <h3 class="text-lg font-bold mb-4">Rendez-vous aujourd'hui</h3>
                @if($todayAppointments->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Heure</th>
                                    <th class="px-4 py-2">Client</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($todayAppointments as $rdv)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $rdv->start_time }}</td>
                                        <td class="border px-4 py-2">{{ $rdv->client->nom }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500">Aucun rendez-vous aujourd'hui</p>
                @endif
            </div>

            <!-- Low Stock Products -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Produits en stock faible</h3>
                @if($lowStockProducts->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Produit</th>
                                    <th class="px-4 py-2">Stock</th>
                                    <th class="px-4 py-2">Prix</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lowStockProducts as $product)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $product->nom }}</td>
                                        <td class="border px-4 py-2">{{ $product->quantite_stock }}</td>
                                        <td class="border px-4 py-2">{{ number_format($product->prix, 2) }} MAD</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500">Aucun produit en stock faible</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
