    @include('kiosk-styles')

    @section('content')
        <div class="background">
            <div
                class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center selection:bg-red-500 selection:text-white">

                <div class="max-w-7xl mx-auto p-6 lg:p-8">
                    @component('components.public-logo-heading')
                    @endcomponent

                    <div class="mt-16">
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                            <form action="{{ route('track.request.details') }}" method="GET">

                                <div class="card">
                                    <div class="card-header">
                                        <h2 class="text-xl font-semibold text-gray-900">Track a Request</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="refnumber" class="form-label">Reference Number</label>
                                            <input placeholder="Enter Request ID" type="text" name="reference_number"
                                                class="form-control" id="refnumber" autofocus>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-danger btn-lg">Submit</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Display the output from the tracking request --}}
                                @isset($request)
                                    <div class="card">
                                        <div class="card-body">
                                            <h2>Request Details</h2>
                                            <p>Reference Number: {{ $request->reference_number }}</p>
                                            <p class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                {{-- <pre>{{ json_encode($request->items, JSON_PRETTY_PRINT) }}</pre> --}}
                                                @foreach ($request->items as $item)
                                                    @if (empty($item['options']))
                                                        <pre>{{ json_encode($item, JSON_PRETTY_PRINT) }}</pre>
                                                    @endif
                                                @endforeach
                                            </p>
                                            <p class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                <pre>{{ json_encode($request->requestors, JSON_PRETTY_PRINT) }}</pre>
                                            </p>
                                            <p>Created At: {{ $request->created_at }}</p>
                                            <p>Updated At: {{ $request->updated_at }}</p>
                                        </div>
                                    </div>
                                @endisset

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
