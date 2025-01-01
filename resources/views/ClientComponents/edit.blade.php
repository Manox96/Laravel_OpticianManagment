<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creé Client') }}
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
                    <form method="POST" action="{{ route('client.update',$client) }}" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div class="space-y-2">
                            <label for="nom" class="block text-sm font-medium text-gray-700">Nom:</label>
                            <input value={{$client->nom}} ="text" name="nom" id="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="space-y-2">
                            <label for="prenom" class="block text-sm font-medium text-gray-700">Prenom:</label>
                            <input type="text" value={{$client->prenom}} name="prenom" id="prenom" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></input>
                        </div>
                        <div class="space-y-2">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                            <input value={{$client->email}} type="text" name="email" id="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="space-y-2">
                            <label for="numero" class="block text-sm font-medium text-gray-700">Tel:</label>
                            <input value={{$client->numero}} type="text" name="numero" id="numero" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="space-y-2">
                            <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse :</label>
                            <input type="text" value={{ $client->adresse }}  name="adresse" id="adresse" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="space-y-2">
                            <label for="date_naissance" class="block text-sm font-medium text-gray-700">Date de Naissance:</label>
                            <input value={{$client->date_naissance}} type="text" name="date_naissance" id="date_naissance" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        {{-- <div class="space-y-2">
                            <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time:</label>
                            <input value={{$client->nom}} type="datetime-local" name="start_time" id="start_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>
                        <div class="space-y-2">
                            <label for="finish_time" class="block text-sm font-medium text-gray-700">Finish Time:</label>
                            <input value={{$client->nom}} type="datetime-local" name="finish_time" id="finish_time" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div> --}}
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