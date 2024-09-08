{{-- ? Notification --}}
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
    </div>
@endif

<script>
    // Auto-dismiss the alert after 3 seconds (3000 ms)
    setTimeout(function() {
        let alert = document.querySelector('.alert');
        if (alert) {
            // Use Bootstrap's built-in method to dismiss the alert
            var alertInstance = bootstrap.Alert.getOrCreateInstance(alert);
            alertInstance.close();
        }
    }, 3000); // 3000ms = 3 seconds
</script>
