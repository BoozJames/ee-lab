@if (session()->has('error'))
    <div id="errorAlert" class="alert alert-danger alert-dismissible fade show my-5" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('success'))
    <div id="successAlert" class="alert alert-success alert-dismissible fade show my-5" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
