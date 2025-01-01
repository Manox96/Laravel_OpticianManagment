<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Cabinet d'Optique</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="bg-gray-50">
            <!-- Section Héro -->
            <div class="relative min-h-screen">
                <!-- Navigation -->
                <nav class="bg-white shadow-lg">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex items-center">
                                <h1 class="text-2xl font-bold text-gray-800">Cabinet d'Optique</h1>
                            </div>

                            @if (Route::has('login'))
                                <div class="flex items-center space-x-4">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="text-gray-700 hover:text-gray-900">Tableau de bord</a>
                                    @else
                                        <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900">Se connecter</a>
                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">S'inscrire</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
                    </div>
                </nav>

                <!-- Contenu Principal -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                        <!-- Colonne Gauche -->
                        <div>
                            <h2 class="text-4xl font-bold text-gray-900 mb-4">Votre Vue, Notre Priorité</h2>
                            <p class="text-lg text-gray-600 mb-8">
                                Découvrez notre sélection de lunettes et lentilles de contact.
                                Prenez rendez-vous avec nos experts pour un service personnalisé.
                            </p>
                            <div class="space-x-4">
                                <a href="{{ route('login') }}" class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700">
                                    Prendre RDV
                                </a>
                                <a href="#services" class="text-blue-600 hover:text-blue-700">
                                    Nos Services →
                                </a>
                            </div>
                        </div>

                        <!-- Colonne Droite -->
                        <div>
                            <img src="https://placehold.co/600x400" alt="Optique" class="rounded-lg shadow-xl">
                        </div>
                    </div>

                    <!-- Section Services -->
                    <div id="services" class="py-16">
                        <h3 class="text-2xl font-bold text-center mb-12">Nos Services</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <!-- Service 1 -->
                            <div class="bg-white p-6 rounded-lg shadow-md">
                                <div class="text-blue-600 mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <h4 class="text-xl font-semibold mb-2">Lunettes de Vue</h4>
                                <p class="text-gray-600">Large gamme de montures et verres adaptés à votre vision.</p>
                            </div>

                            <!-- Service 2 -->
                            <div class="bg-white p-6 rounded-lg shadow-md">
                                <div class="text-blue-600 mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                </div>
                                <h4 class="text-xl font-semibold mb-2">Lentilles de Contact</h4>
                                <p class="text-gray-600">Solutions adaptées pour un confort optimal au quotidien.</p>
                            </div>

                            <!-- Service 3 -->
                            <div class="bg-white p-6 rounded-lg shadow-md">
                                <div class="text-blue-600 mb-4">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <h4 class="text-xl font-semibold mb-2">Examens de Vue</h4>
                                <p class="text-gray-600">Consultations professionnelles et conseils personnalisés.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pied de Page -->
                <footer class="bg-gray-800 text-white py-8">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div>
                                <h5 class="text-lg font-semibold mb-4">Contact</h5>
                                <p>Email: contact@cabinetoptique.com</p>
                                <p>Tél: +212 6XX-XXXXXX</p>
                            </div>
                            <div>
                                <h5 class="text-lg font-semibold mb-4">Horaires</h5>
                                <p>Lun - Ven: 9h - 18h</p>
                                <p>Sam: 9h - 13h</p>
                            </div>
                            <div>
                                <h5 class="text-lg font-semibold mb-4">Suivez-nous</h5>
                                <div class="flex space-x-4">
                                    <a href="#" class="hover:text-blue-400">Facebook</a>
                                    <a href="#" class="hover:text-blue-400">Instagram</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </body>
</html>
