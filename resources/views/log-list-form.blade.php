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
                            <h4>Log List</h4>
                            <div class="row row-cols-1 row-cols-md-4 my-2">
                                @foreach ($requests as $request)
                                    <div class="col mb-4">
                                        <div class="card d-flex flex-column h-100">
                                            <div class="card-header d-flex justify-content-between align-items-center">
                                                <p class="card-text">{{ $request->reference_number }}</p>
                                                {{-- <span class="badge bg-secondary">Items:>
                                                    @foreach ($request->items as $item)
                                                        @if (empty($item['options']))
                                                            <pre>{{ json_encode($item, JSON_PRETTY_PRINT) }}</pre>
                                                        @endif
                                                    @endforeach
                                                </span>
                                                <span class="badge bg-secondary">Requestor:
                                                    <pre>{{ json_encode($request->requestors, JSON_PRETTY_PRINT) }}</pre>
                                                </span> --}}
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
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
