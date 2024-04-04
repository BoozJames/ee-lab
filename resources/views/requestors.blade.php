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


                    {{-- Items --}}
                    <div class="col-md-8 offset-md-2 mb-2 mt-2">
                        <div class="card">
                            <div class="card-header">Items in Cart:</div>
                            <div class="card-body">
                                <table class="table table-image">
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col"></th> --}}
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
                                                    {{-- <td class="w-25">
                                                        <img src="{{ $cartItem->options->image }}" class="img-fluid img-thumbnail"
                                                    alt="{{ $cartItem->name }}">
                                                    </td> --}}
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
                            <div class="card-body">

                                <table class="table align-middle">
                                    <thead>
                                        <tr>
                                            {{-- <th scope="col"></th> --}}
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
                                                    {{-- <td class="w-25"></td> --}}
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


                </div>
            </div>

        </div>
    </div>

    <!-- Timeout Modal -->
    <div class="modal fade" id="timeoutModal" tabindex="-1" aria-labelledby="timeoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="timeoutModalLabel">Transaction Timeout</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="countdownMessage">
                    Your transaction will be canceled in <span id="countdown">10</span> seconds due to inactivity.
                    Please take action to continue.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript code -->
    <script>
        // Variable to hold the timer
        let timeoutTimer;

        // Function to reset the timer and show modal after 30 seconds of inactivity
        function resetTimer() {
            // Clear the previous timer
            clearTimeout(timeoutTimer);

            // Set a new timer for 30 seconds
            timeoutTimer = setTimeout(() => {
                // Display the modal after 30 seconds of inactivity
                $('#timeoutModal').modal('show');

                let seconds = 10; // Initial countdown value in seconds

                // Function to update countdown display
                function updateCountdown() {
                    document.getElementById('countdown').textContent = seconds;
                    if (seconds === 0) {
                        // Redirect user or take necessary action when countdown reaches 0
                        window.location.href = "/";
                        cancelAndRemoveCart();
                    }
                    seconds--;
                }

                // Call updateCountdown function every second
                const countdownInterval = setInterval(updateCountdown, 1000);

                // Function to stop countdown
                function stopCountdown() {
                    clearInterval(countdownInterval);
                }

                // Call stopCountdown function when modal is closed
                $('#timeoutModal').on('hidden.bs.modal', function() {
                    stopCountdown();
                });
            }, 30000); // 30 seconds
        }

        // Call the resetTimer function on page load
        $(document).ready(resetTimer);

        // Event listener to reset the timer on user activity
        $(document).mousemove(resetTimer);
        $(document).keypress(resetTimer);

        // Function to cancel and remove cart
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
