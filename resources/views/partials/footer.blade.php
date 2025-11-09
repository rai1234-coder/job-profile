<footer class="footer py-4">
  <div class="container text-center">
    <a href="#" class="footer-logo fw-bold text-primary">Job<span class="text-dark">Portal</span></a>
    <p class="mt-2 text-muted small">
      Find your dream job faster — powered by Laravel.
    </p>

    <div class="social-icons mt-3">
      <a href="#"><i class="bi bi-facebook"></i></a>
      <a href="#"><i class="bi bi-twitter"></i></a>
      <a href="#"><i class="bi bi-linkedin"></i></a>
      <a href="#"><i class="bi bi-instagram"></i></a>
    </div>

    <hr class="my-3">
    <p class="text-muted small mb-0">&copy; 2025 JobPortal. All rights reserved.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000, // disappears after 2 seconds
                position: 'top',
                toast: true
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 3000,
                position: 'top',
                toast: true
            });
        @endif
    });
</script>