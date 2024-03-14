    @include('kiosk-styles')
    </head>

    <body class="antialiased">
        <div class="background">
            <div
                class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center selection:bg-red-500 selection:text-white">
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                in</a>

                            {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif --}}
                        @endauth
                    </div>
                @endif

                <div class="max-w-7xl mx-auto p-6 lg:p-8">
                    <div class="flex justify-center">
                        <img src="images/bsu-neu-logo.png" style="width: 100px; height: 93px; margin-right: 10px;"
                            alt="">
                        <img src="images/ee-logo.png" style="width: 100px; height: 93px; margin-left: 10px;"
                            alt="">
                    </div>

                    <!-- Title and subtitle -->
                    <div class="text-center mt-4">
                        <h1 class="mt-6 text-xl font-semibold text-gray-900">Batangas State University</h1>
                        <h2 class="text-xxl font-semibold text-gray-900">The National Engineering University</h2>
                        <p class="text-xxxl text-gray-700">Automated Management System Kiosk</p>
                    </div>

                    <div class="mt-16">
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                            <a href="{{ route('create.request') }}"
                                class="scale-100 p-6 bg-white dark:bg-white-800/50 dark:bg-gradient-to-bl from-red-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div class="flex items-center">
                                    <div
                                        class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-hand-index-thumb w-7 h-7 stroke-red-500"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 0 0 1 0V6.435l.106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 1 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.118a.5.5 0 0 1-.447-.276l-1.232-2.465-2.512-4.185a.517.517 0 0 1 .809-.631l2.41 2.41A.5.5 0 0 0 6 9.5V1.75A.75.75 0 0 1 6.75 1M8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v6.543L3.443 6.736A1.517 1.517 0 0 0 1.07 8.588l2.491 4.153 1.215 2.43A1.5 1.5 0 0 0 6.118 16h6.302a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5 5 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.6 2.6 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046zm2.094 2.025" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h2 class="text-xl font-semibold text-gray-900">Borrow</h2>
                                        <p class="mt-1 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                            Choose a trainer or items when creating a request
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <a href="{{ route('track.request') }}"
                                class="scale-100 p-6 bg-white dark:bg-white-800/50 dark:bg-gradient-to-bl from-red-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div class="flex items-center">
                                    <div
                                        class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-search w-7 h-7 stroke-red-500"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h2 class="text-xl font-semibold text-gray-900">Track</h2>
                                        <p class="mt-1 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                            Look for the status of your request using the kiosk or check it online
                                        </p>
                                    </div>
                                </div>
                            </a>

                            <a href="{{ route('track.request') }}"
                                class="scale-100 p-6 bg-white dark:bg-white-800/50 dark:bg-gradient-to-bl from-red-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                                <div class="flex items-center">
                                    <div
                                        class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-card-list w-7 h-7 stroke-red-500"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                                            <path
                                                d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <h2 class="text-xl font-semibold text-gray-900">Logs</h2>
                                        <p class="mt-1 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                            See the list of borrowed items
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                        {{-- <div class="text-center text-sm sm:text-left">
                        &nbsp;
                    </div> --}}

                        {{-- <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
