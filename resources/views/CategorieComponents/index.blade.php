<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight text-center">
            {{ __('Gestion de Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" href="{{ route('categorie.create') }}">Ajouter nouveaux categorie</a>
                    <table class="mx-auto">
                        <thead>
                            <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Nom de Categorie</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($allcategories as $cat)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="text-sm font-medium text-gray-900">{{ $cat->id  }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        <div class="text-sm font-medium text-gray-900">{{ $cat->nom   }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                                        <a href="{{ route('categorie.edit', $cat->id) }}" class="text-indigo-600 hover:text-indigo-900">Modifier</a>
                                        <form method="POST" action="{{ route('categorie.destroy', $cat->id) }}" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')" class="text-red-600 hover:text-red-900">Supprimer</button>
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
