<div class="card">
    <div class="card-body">
        <form action="{{ route('feed') }}" method="GET">
            <div class="d-flex">
                <div class="d-flex position-relative w-100">
                    <span class="position-absolute" style="left: 10px; top: 50%; transform: translateY(-50%);">
                        <i class="fas fa-search text-secondary"></i>
                    </span>
                    <input value="{{ request('search', '') }}" name="search" placeholder="Mau cari apa?"
                        class="text-secondary bg-white-50 form-control ps-5" type="text">
                </div>
                <button class="btn btn-primary bg-blue ms-2">Find</button>
            </div>
        </form>
    </div>
</div>
