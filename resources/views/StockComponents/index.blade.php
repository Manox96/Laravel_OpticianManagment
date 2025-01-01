<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight text-center">
            {{ __('Gestion de Produits') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('produit.create') }}">Add new Produit</a>
                    <table class="mx-auto">
                        <thead>
                            <tr>
                                <th class="text-center">Nom Produit</th>
                                <th class="text-center">categorie</th>
                                <th class="text-center">Qte Stock</th>
                                <th class="text-center">Prix</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produits as $produit)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="text-sm font-medium text-gray-900">{{ $produit->nom }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="text-sm font-medium text-gray-900">{{ $produit->categorie_nom }}</div>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="text-sm font-medium text-gray-900">{{ $produit->quantite_stock }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="text-sm font-medium text-gray-900">{{ $produit->prix . " MAD" }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <a href="{{ route('produit.edit', $produit->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                        <form method="POST" action="{{ route('produit.destroy', $produit->id) }}" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:text-red-900">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
