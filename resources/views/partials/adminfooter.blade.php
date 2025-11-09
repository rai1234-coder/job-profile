  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.12/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.12/mode/javascript/javascript.min.js"></script>

<script>
  const resEditor = CodeMirror.fromTextArea(
    document.getElementById("responsibilitiesCode"),
    {
      lineNumbers: true,
      mode: "htmlmixed",
      theme: "material-darker",
      lineWrapping: true,
    }
  );

  const reqEditor = CodeMirror.fromTextArea(
    document.getElementById("requirementsCode"),
    {
      lineNumbers: true,
      mode: "htmlmixed",
      theme: "material-darker",
      lineWrapping: true,
    }
  );
</script>
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
</body>
</html>