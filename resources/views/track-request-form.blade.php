    @include('kiosk-styles')

    @section('content')
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
                        @endauth
                    </div>
                @endif

                <div class="max-w-7xl mx-auto p-6 lg:p-8">
                    <div class="flex justify-center">
                        <img src="images/bsu-neu-logo.png" style="width: 100px; height: 93px; margin-right: 10px;"
                            alt="">
                        <img src="images/ee-logo.png" style="width: 100px; height: 93px; margin-left: 10px;" alt="">
                    </div>

                    <!-- Title and subtitle -->
                    <div class="text-center mt-4">
                        <h1 class="mt-6 text-xl font-semibold text-gray-900">Batangas State University</h1>
                        <h2 class="text-xxl font-semibold text-gray-900">The National Engineering University</h2>
                        <p class="text-xxxl text-gray-700">Automated Management System Kiosk</p>
                    </div>

                    <div class="mt-16">
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                            <form action="{{ route('track.request') }}" method="GET">

                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="text-xl font-semibold text-gray-900">Track a Request</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="refnumber" class="form-label">Reference Number</label>
                                            <input placeholder="Enter Request ID" type="text" name="request_id"
                                                class="form-control" id="refnumber" autofocus>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-danger btn-lg">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                        <div class="text-center text-sm sm:text-left">
                            &nbsp;
                        </div>

                        <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                            <a href="/" class="btn btn-danger">Go back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
