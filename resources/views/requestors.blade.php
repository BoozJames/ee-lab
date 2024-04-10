@include('kiosk-styles')

@section('content')

    <nav class="navbar navbar-expand-lg osition fixed-top bg-danger">
        <div class="container-fluid">
            {{-- <a class="navbar-brand text-white" href="/">EE-Lab</a> --}}
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            </div>
            <button type="button" class="btn btn-secondary position-relative d-flex mx-1 my-1"
                onclick="cancelAndRemoveCart()">
                Cancel
            </button>
            {{-- Checkout Button --}}
            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success position-relative d-flex mx-1 my-1">Checkout</button>
            </form>
        </div>
    </nav>

    <div class="dark-background bg-dots-darker bg-center" style="height: 95vh;">
        <div class="container" style="padding-top: 3rem; margin-top: 3rem;">
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    @if ($requestors->isEmpty())
                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                            <p>No requestors found.</p>
                        </div>
                    @else
                        <ul class="list-group">
                            @foreach ($requestors as $requestor)
                                <li class="list-group-item">
                                    <div class="flex justify-center mb-2">
                                        <img src="{{ url('/images/tap-id.jpg') }}" style="width: 30%; height: 100%;"
                                            alt="">
                                    </div>
                                    <form action="{{ route('cart.addRequestor') }}" method="POST" class="d-inline">
                                        @csrf
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Tap Student ID</span>
                                            <input type="text" class="form-control" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-lg" name="requestor"
                                                value="{{ $requestor }}" autofocus autocomplete="off">
                                        </div>
                                        <div class="d-grid gap-2 my-2">
                                            {{-- <button type="submit" class="btn btn-success btn-lg float-right">Add
                                                requestor</button> --}}
                                        </div>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="{{ route('cart.checkout') }}" method="POST">
                        @csrf

                        {{-- Items --}}
                        <div class="col-md-8 offset-md-2 mb-2 mt-2">
                            <div class="card">
                                <div class="card-header">Items in Cart:</div>
                                <div class="card-body">
                                    <table class="table table-image">
                                        <!-- Items Table Header -->
                                        <thead>
                                            <tr>
                                                <th scope="col">Item ID</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <!-- Items Table Body -->
                                        <tbody>
                                            @foreach (Cart::content() as $cartItem)
                                                @unless ($cartItem->options->requestor)
                                                    <tr>
                                                        <td>{{ $cartItem->id }}</td>
                                                        <td>{{ $cartItem->name }}</td>
                                                        <td>{{ $cartItem->qty }}</td>
                                                        <td>
                                                            <!-- Remove Item Form -->
                                                            <form action="{{ route('cart.remove', $cartItem->rowId) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Remove</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endunless
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- Requestors --}}
                        <div class="col-md-8 offset-md-2 mb-2">
                            <div class="card">
                                <div class="card-header">Requestors in Cart:</div>
                                <div class="card-body">
                                    <table class="table align-middle">
                                        <!-- Requestors Table Header -->
                                        <thead>
                                            <tr>
                                                <th scope="col">Requestor ID</th>
                                                <th scope="col">Student Details</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <!-- Requestors Table Body -->
                                        <tbody>
                                            @foreach (Cart::content() as $cartItem)
                                                @if ($cartItem->options->requestor)
                                                    <tr>
                                                        <td>{{ $cartItem->id }}</td>
                                                        <td>
                                                            <!-- Display Student Details -->
                                                            @if (isset($cartItem->options['student_details']))
                                                                <p><strong>SR Code:</strong>
                                                                    {{ $cartItem->options['student_details']['srcode'] }}
                                                                </p>
                                                                <p><strong>Full Name:</strong> {{ $cartItem->name }}</p>
                                                                <p><strong>Campus:</strong>
                                                                    {{ $cartItem->options['student_details']['campus'] }}
                                                                </p>
                                                                <p><strong>Course:</strong>
                                                                    {{ $cartItem->options['student_details']['courses'] }}
                                                                </p>
                                                            @else
                                                                N/A
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <!-- Remove Requestor Form -->
                                                            <form action="{{ route('cart.remove', $cartItem->rowId) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Remove</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    @component('components.timeout-modal')
    @endcomponent