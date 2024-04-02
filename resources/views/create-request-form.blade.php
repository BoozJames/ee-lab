    @include('kiosk-styles')

    @section('content')
        <div class="dark-background bg-dots-darker bg-center">

            <nav class="navbar navbar-expand-lg osition fixed-top bg-danger">
                <div class="container-fluid">
                    <a class="navbar-brand text-white" href="/">EE-Lab</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/">Trainers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/">Items</a>
                            </li>
                        </ul>
                    </div>

                    {{-- <div class="d-flex justify-content-center flex-grow-1">
                        <form class="d-flex">
                            <input class="form-control me-2" style="width: 500px;" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success" type="submit">Search</button>
                        </form>
                    </div> --}}

                    <button type="button" class="btn btn-secondary position-relative d-flex mx-1" onclick="goBack()">
                        Cancel
                    </button>

                    <button type="button" class="btn btn-success position-relative d-flex mx-1" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Cart
                        <span
                            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-light text-dark">
                            6
                        </span>
                    </button>

                </div>
            </nav>


            {{-- <div class="flex justify-center py-3 sticky-top">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-danger btn-lg position-relative d-flex mx-3" onclick="goBack()">
                        Cancel
                    </button>

                    <button type="button" class="btn btn-secondary btn-lg position-relative d-flex mx-3">
                        Cart
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            6
                        </span>
                    </button>
                </div>
            </div> --}}

            <div class="my-6 container flex mt-5">

                <div class="row my-3">
                    @foreach ($items as $item)
                        <div class="col-sm-3">
                            <div class="card m-2" style="width: 18rem;">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <p class="card-text">{{ $item->name }}</p>
                                    <span class="badge bg-secondary">Available: {{ $item->itemVariants->count() }}</span>
                                </div>
                                <div class="card-body">
                                    <img src="{{ Storage::url($item->image) }}" class="card-img-top p-3" alt="">
                                </div>
                                <div class="card-footer">
                                    <div class="d-grid gap-2">
                                        <a href="#" class="btn btn-danger">Add to Request
                                            {{-- <span class="badge bg-secondary">1</span> --}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header border-bottom-0">
                        <h5 class="modal-title" id="exampleModalLabel">
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
                                <tr>
                                    <td class="w-25">
                                        <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/vans.png"
                                            class="img-fluid img-thumbnail" alt="Sheep">
                                    </td>
                                    <td>Product</td>
                                    <td>2</td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-sm">
                                            Remove
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-between">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-secondary">Proceed</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function goBack() {
                window.location.href = "{{ redirect()->back()->getTargetUrl() }}";
            }
        </script>
