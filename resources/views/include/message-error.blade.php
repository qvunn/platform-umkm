{{-- ? Notification --}}
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Cerita berhasil diunggah
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

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
