@include('kiosk-styles')

@section('content')

    <nav class="navbar navbar-expand-lg osition fixed-top bg-danger">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/">EE-Lab</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <button type="button" class="btn btn-secondary position-relative d-flex mx-1 my-1"
                onclick="cancelAndRemoveCart()">
                Cancel
            </button>

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
                    <div class="card">
                        <div class="card-header">Requestors</div>

                        <div class="card-body">
                            @if ($requestors->isEmpty())
                                <p>No requestors found.</p>
                            @else
                                <ul class="list-group">
                                    @foreach ($requestors as $requestor)
                                        <li class="list-group-item">
                                            <span class="badge badge-info">Requestor</span> {{ $requestor }}
                                            <form action="{{ route('cart.addRequestor') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="text" name="requestor" value="{{ $requestor }}">
                                                <button type="submit" class="btn btn-primary btn-sm float-right">Add to
                                                    Cart</button>
                                            </form>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>

                    {{-- Items --}}
                    <div class="col-md-8 offset-md-2 mb-2 mt-2">
                        <div class="card">
                            <div class="card-header">Items in Cart:</div>
                            <div class="card-body">
                                <table class="table table-image">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Item ID</th>
                                            <th scope="col">Item Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $cartItem)
                                            @unless ($cartItem->options->requestor)
                                                <tr>
                                                    <td class="w-25">
                                                        {{-- <img src="{{ $cartItem->options->image }}" class="img-fluid img-thumbnail"
                                                    alt="{{ $cartItem->name }}"> --}}
                                                    </td>
                                                    <td>{{ $cartItem->id }}</td>
                                                    <td>{{ $cartItem->name }}</td>
                                                    <td>{{ $cartItem->qty }}</td>

                                                    <td>
                                                        <form action="{{ route('cart.remove', $cartItem->rowId) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Requestor ID</th>
                                        {{-- <th scope="col">Requestor Name</th> --}}
                                        <th scope="col">Student Details</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (Cart::content() as $cartItem)
                                        @if ($cartItem->options->requestor)
                                            <tr>
                                                <td>{{ $cartItem->id }}</td>
                                                {{-- <td>{{ $cartItem->name }}</td> --}}
                                                <td>
                                                    @if (isset($cartItem->options['student_details']))
                                                        <p><strong>SR Code:</strong>
                                                            {{ $cartItem->options['student_details']['srcode'] }}</p>
                                                        <p><strong>Full Name:</strong> {{ $cartItem->name }}</p>
                                                        <p><strong>Campus:</strong>
                                                            {{ $cartItem->options['student_details']['campus'] }}</p>
                                                        <p><strong>Course:</strong>
                                                            {{ $cartItem->options['student_details']['campus'] }}</p>
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    <form action="{{ route('cart.remove', $cartItem->rowId) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
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
            </div>

        </div>
    </div>

    <script>
        function cancelAndRemoveCart() {
            // Send AJAX request to remove the cart
            fetch('/cart/destroy', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        // If successful, redirect back
                        // window.location.href = "{{ redirect()->back()->getTargetUrl() }}";
                        // If successful, redirect to root URL
                        window.location.href = "/";
                    } else {
                        console.error('Failed to remove cart');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
