    @include('kiosk-styles')

    @section('content')
        <div class="dark-background bg-dots-darker bg-center">

            {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary position fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/">EE-Lab</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/">Trainers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/">Items</a>
                            </li>
                        </ul>
                    </div>

                    <button type="button" class="btn btn-danger btn-lg position-relative d-flex mx-3">
                        Cancel
                    </button>

                    <button type="button" class="btn btn-secondary btn-lg position-relative d-flex">
                        Cart
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            6
                        </span>
                    </button>

                </div>
            </nav> --}}


            <div class="flex justify-center py-3 sticky-top">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-danger btn-lg position-relative d-flex mx-3" onclick="goBack()">
                        Cancel
                    </button>

                    <script>
                        function goBack() {
                            window.location.href = "{{ redirect()->back()->getTargetUrl() }}";
                        }
                    </script>
                    {{-- <img src="images/bsu-neu-logo.png" style="width: 100px; height: 93px; margin-right: 10px;" alt="">
                    <img src="images/ee-logo.png" style="width: 100px; height: 93px; margin-left: 10px;" alt=""> --}}
                    <button type="button" class="btn btn-secondary btn-lg position-relative d-flex mx-3">
                        Cart
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            6
                        </span>
                    </button>
                </div>
            </div>

            <div class="my-6 container flex">

                <div class="row my-3">
                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header d-flex justify-content-between">
                                <p class="card-text">Item 1</p>
                                <p class="card-text">Qty: <span class="badge bg-secondary">4</span></p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request <span
                                            class="badge bg-secondary">4</span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-3 ">
                        <div class="card m-2" style="width: 18rem;">
                            <div class="card-header">
                                <p class="card-text">Item 1</p>
                            </div>
                            <div class="card-body">
                                <img src="images/bsu-neu-logo.png" class="card-img-top p-3" alt="...">
                            </div>
                            <div class="card-footer">
                                <div class="d-grid gap-2">
                                    <a href="#" class="btn btn-danger">Add to Request</a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
