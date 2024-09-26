    @include('kiosk-styles')

    @section('content')
        <div class="dark-background bg-dots-darker bg-center">

            <nav class="navbar navbar-expand-lg osition fixed-top bg-danger">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                        </ul>
                    </div>
                    <a href="/" class="btn btn-secondary position-relative d-flex mx-1 my-1"> Go Back</a>
                </div>
            </nav>

            <div class="dark-background bg-dots-darker bg-center" style="height: 95vh;">
                <div class="container">
                    <div class="mt-16">
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                            <form action="{{ route('track.request.details') }}" method="GET">

                                <div class="card my-5">
                                    <div class="card-header">
                                        <h2 class="text-xl font-semibold text-gray-900">Track your Request</h2>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="refnumber" class="form-label">Reference Number</label>
                                            <input placeholder="Enter Reference Number" type="text"
                                                name="reference_number" class="form-control" id="refnumber" autofocus>
                                        </div>
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-danger btn-lg">Submit</button>
                                        </div>
                                    </div>
                                </div>

                                {{-- Display the output from the tracking request --}}
                                @isset($request)
                                    <div class="card">
                                        <div class="card-header">
                                            <h2>Request Details</h2>
                                            <p>Reference Number: {{ $request->reference_number }}</p>
                                            <p>Status:
                                                @if ($request->completed)
                                                    <span class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">
                                                        Returned
                                                    </span>
                                                @else
                                                    <span class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">
                                                        Borrowed
                                                    </span>
                                                @endif
                                            </p>                                            
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h3>Items:</h3>
                                                    <p class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                        @foreach ($request->items as $item)
                                                            @if (empty($item['options']))
                                                                {{-- <pre>{{ json_encode($item, JSON_PRETTY_PRINT) }}</pre> --}}
                                                                <p>{{ $item['name'] }} | {{ $item['qty'] }}</p>
                                                            @endif
                                                        @endforeach
                                                    </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <h3>Requestors:</h3>
                                                    <p class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                        @foreach ($request->requestors as $requestor)
                                                            @if (!empty($requestor))
                                                                <p>{{ $requestor['first_name'] }}
                                                                    @if (!empty($requestor['middle_name']))
                                                                        {{ $requestor['middle_name'] }}
                                                                    @endif
                                                                    {{ $requestor['last_name'] }}
                                                                </p>
                                                                {{-- @else
                                                            <p>No requestor information available.</p> --}}
                                                            @endif
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <p>Date Requested: {{ date('F j, Y g:i A', strtotime($request->created_at)) }}</p>
                                        </div>
                                    </div>
                                @endisset

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        @component('components.timeout-modal')
        @endcomponent
