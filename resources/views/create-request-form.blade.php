    @include('kiosk-styles')

    @section('content')
        <div class="dark-background bg-dots-darker bg-center">

            <nav class="navbar navbar-expand-lg osition fixed-top bg-danger">
                <div class="container-fluid">
                    {{-- <a class="navbar-brand text-white" href="/">EE-Lab</a> --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            {{-- <li class="nav-item">
                                <a class="nav-link text-white" href="/">Trainers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/">Items</a>
                            </li> --}}
                        </ul>
                    </div>

                    {{-- <div class="d-flex justify-content-center flex-grow-1">
                        <form class="d-flex">
                            <input class="form-control me-2" style="width: 500px;" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                    </div> --}}

                    <button type="button" class="btn btn-secondary position-relative d-flex mx-1 my-1"
                        onclick="cancelAndRemoveCart()">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-success position-relative d-flex mx-1" data-bs-toggle="modal"
                        data-bs-target="#cartModal">
                        Cart
                        @php
                            $itemCount = 0;
                        @endphp

                        @foreach (Cart::content() as $cartItem)
                            @unless ($cartItem->options->requestor)
                                @php
                                    $itemCount += $cartItem->qty;
                                @endphp
                            @endunless
                        @endforeach

                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light text-dark">
                            {{ $itemCount }}
                        </span>
                    </button>

                </div>
            </nav>

            <div class="container" style="padding-top: 3rem; margin-top: 3rem;">
                <div class="row">
                    @component('components.alert-message')
                    @endcomponent
                </div>
                <div class="row row-cols-1 row-cols-md-4">
                    @foreach ($items as $item)
                        <div class="col mb-4">
                            <div class="card d-flex flex-column h-100">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <p class="card-text">{{ $item->name }}</p>
                                    <span class="badge bg-secondary">Available: {{ $item->itemVariants->count() }}</span>
                                </div>
                                <div class="card-body">
                                    <img src="{{ Storage::url($item->image) }}" class="card-img-top p-3" alt="">
                                </div>
                                <!-- Send a POST request to addToCart endpoint -->
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <div class="card-footer">
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-danger">Add to Request</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <!-- Cart Modal -->
        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="cartModalLabel">
                            Your Cart
                        </h5>
                    </div>
                    <div class="modal-body">
                        <table class="table table-image">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Product</th>
                                    <th scope="col">Qty</th>
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
                                            <td>{{ $cartItem->name }}</td>
                                            <td>{{ $cartItem->qty }}</td>
                                            <td>
                                                <form action="{{ route('cart.remove', $cartItem->rowId) }}" method="POST">
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
                    <div class="modal-footer border-top-0 d-flex justify-content-between">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <a href="/cart/requestors" type="button" class="btn btn-secondary">Proceed</a>
                    </div>
                </div>
            </div>
        </div>

        @component('components.timeout-modal')
        @endcomponent
