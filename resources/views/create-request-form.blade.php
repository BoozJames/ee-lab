    @include('kiosk-styles')

    @section('content')

        <div class="">
            <div
                class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center selection:bg-red-500 selection:text-white">

                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="/"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Go
                                Back</a>
                        @endauth
                    </div>
                @endif

                <div class="mt-3">
                    <div class="container flex">

                        <div class="row">

                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-3">
                                <div class="card m-2" style="width: 18rem;">
                                    <div class="card-header">
                                        <p class="card-text">Item 1</p>
                                    </div>
                                    <div class="card-body">
                                        <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                                    </div>
                                    <div class="card-footer">
                                        <div class="d-grid gap-2">
                                            <a href="#" class="btn btn-primary">Add to Request</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>
                </div>


            </div>
        </div>
        </div>
