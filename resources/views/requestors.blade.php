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
            <button onclick="printContent()" class="btn btn-primary position-relative d-flex mx-1 my-1">Print</button>

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
            @component('components.alert-message')
            @endcomponent
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
                    <div id="print-content">

                        {{-- Items --}}
                        <div class="col-md-8 offset-md-2 mb-2 mt-2">
                            <div class="card">
                                <div class="card-header">Items:</div>
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
                                <div class="card-header">Requestors:</div>
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

                    </div>

                </div>
            </div>

        </div>
    </div>

    @component('components.timeout-modal')
    @endcomponent

    <iframe id="print-frame" style="display: none;"></iframe>

    {{-- <script>
        function printContent() {
            // Clone the content to be printed
            var printContent = document.getElementById('print-content').cloneNode(true);
    
            // Find and remove the "Actions" column and buttons from the cloned content
            var actionCells = printContent.querySelectorAll('td:last-child');
            actionCells.forEach(function(cell) {
                cell.parentNode.removeChild(cell);
            });
    
            // Create a print window and write the modified content
            var printFrame = document.getElementById('print-frame');
            var printDocument = printFrame.contentWindow.document;
    
            // Write content to print to the iframe
            printDocument.open();
            printDocument.write('<html><head><title>Print Page</title>');
            printDocument.write('<style>@page { size: A8; }</style>'); // Set print size to A8
            printDocument.write('</head><body>');
            printDocument.write(printContent.innerHTML);
            printDocument.write('</body></html>');
            printDocument.close();
    
            // Print the content
            printFrame.contentWindow.print();
        }
    </script> --}}

    {{-- <script>
        function printContent() {
            // Clone the content to be printed
            var printContent = document.getElementById('print-content').cloneNode(true);
    
            // Find and remove the "Actions" column and buttons from the cloned content
            var actionCells = printContent.querySelectorAll('td:last-child');
            actionCells.forEach(function(cell) {
                cell.parentNode.removeChild(cell);
            });
    
            // Find and remove the "Actions" column header (th) from the cloned content
            var actionHeader = printContent.querySelector('th:last-child');
            if (actionHeader) {
                actionHeader.parentNode.removeChild(actionHeader);
            }
    
            // Create a print window and write the modified content
            var printFrame = document.getElementById('print-frame');
            var printDocument = printFrame.contentWindow.document;
    
            // Write content to print to the iframe
            printDocument.open();
            printDocument.write('<html><head><title>Print Page</title>');
            printDocument.write('<style>@page { size: A8; }</style>'); // Set print size to A8
            printDocument.write('</head><body>');
            printDocument.write(printContent.innerHTML);
            printDocument.write('</body></html>');
            printDocument.close();
    
            // Print the content
            printFrame.contentWindow.print();
        }
    </script> --}}

    <script>
        function printContent() {
            // Clone the content to be printed
            var printContent = document.getElementById('print-content').cloneNode(true);

            // Find and remove the "Actions" column and buttons from the cloned content
            var actionCells = printContent.querySelectorAll('td:last-child');
            actionCells.forEach(function(cell) {
                cell.parentNode.removeChild(cell);
            });
            var actionCells = printContent.querySelectorAll('td:first-child');
            actionCells.forEach(function(cell) {
                cell.parentNode.removeChild(cell);
            });

            // Find and remove all <th> elements from the cloned content
            var thElements = printContent.querySelectorAll('th');
            thElements.forEach(function(th) {
                th.parentNode.removeChild(th);
            });

            // Create a print window and write the modified content
            var printFrame = document.getElementById('print-frame');
            var printDocument = printFrame.contentWindow.document;

            // Write content to print to the iframe
            printDocument.open();
            printDocument.write('<html><head><title>Print Page</title>');
            printDocument.write('<style>@page { size: A8; }</style>'); // Set print size to A8
            printDocument.write('</head><body>');
            printDocument.write(printContent.innerHTML);
            printDocument.write('</body></html>');
            printDocument.close();

            // Print the content
            printFrame.contentWindow.print();
        }
    </script>
