<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit categorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('produit.store') }}" class="space-y-4">
                        @csrf
                        <div class="space-y-2">
                            <label for="nom" class="block text-sm font-medium text-gray-700">Nom produit :</label>
                            <input  type="text" name="nom" id="nom" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></input>
                        </div>
                        <div class="space-y-2">
                            <label for="type" class="block text-sm font-medium text-gray-700">Categorie produit :</label>
                            <select name="type" id="type" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label for="quantite_stock" class="block text-sm font-medium text-gray-700">Qte produit :</label>
                            <input  type="number" name="quantite_stock" id="quantite_stock" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></input>
                        </div>
                        <div class="space-y-2">
                            <label for="prix" class="block text-sm font-medium text-gray-700">Prix produit :</label>
                            <input  type="number" name="prix" id="prix" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></input>
                        </div>
                    
                        <div>
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Enregistrer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
