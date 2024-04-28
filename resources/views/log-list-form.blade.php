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
                        <div class="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 py-2">
                            {{-- <h4>Log List</h4> --}}
                            <div class="row row-cols-1 row-cols-md-4 my-2">
                                @foreach ($requests as $request)
                                    <div class="col mb-4">
                                        {{-- <div class="card d-flex flex-column h-100">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <p class="card-text">{{ $request->reference_number }}</p>
                                            </div>
                                            <div class="card-body">
                                                <ul>
                                                    @foreach ($request->items as $item)
                                                        @if (empty($item['options']))
                                                            <pre>{{ json_encode($item, JSON_PRETTY_PRINT) }}</pre>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                                <ul>
                                                    <pre>{{ json_encode($request->requestors, JSON_PRETTY_PRINT) }}</pre>
                                                </ul>
                                            </div>
                                        </div> --}}

                                        <div class="card d-flex flex-column h-100">
                                            <div class="card-header">
                                                <h2>Request Details</h2>
                                                <p>Reference Number: {{ $request->reference_number }}</p>
                                            </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3>Items:</h3>
                                                        <p
                                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                            @foreach ($request->items as $item)
                                                                @if (is_array($item) && empty($item['options']))
                                                                    <p>{{ $item['name'] }} | {{ $item['qty'] }}</p>
                                                                @endif
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <h3>Requestors:</h3>
                                                        <p
                                                            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                                                            @foreach ($request->requestors as $requestor)
                                                                @if (is_array($requestor) && !empty($requestor))
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
                                                <p>Date Requested: {{ $request->created_at }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @component('components.timeout-modal')
        @endcomponent
