<div class="card">
    <div class="card-body">
        <p class="fs-5 fw-semibold text-dark">Mau cari apa?</p>
        <hr class="border-primary opacity-100 border-2 mb-3">
        <form action="{{ route('feed') }}" method="GET">
            <input value="{{ request('search', '') }}" name="search" placeholder="Type here" class="text-secondary bg-white-50 form-control w-100" type="text">
            <button class="btn btn-primary bg-blue mt-3">Find</button>
        </form>
    </div>
</div>
