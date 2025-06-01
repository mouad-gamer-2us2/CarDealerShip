@props(['title'])
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ $title }}</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
  @livewireStyles
</head>

<body>
  <x-admin-nav />

  <div class="container mt-4">
    {{ $slot }}
  </div>

  <x-footer />

  @livewireScripts
@stack('scripts')


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if(session('success'))
<script>
    Swal.fire({
        title: 'Success!',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK',
        allowOutsideClick: true,
        allowEscapeKey: true
    });
</script>
@endif

@if($errors->any())
<script>
    Swal.fire({
        title: 'Validation Error',
        text: 'Please check the form fields.',
        icon: 'error',
        confirmButtonText: 'Ok'
    });
</script>
@endif

<script>
  document.addEventListener('DOMContentLoaded', function () {
      const deleteForms = document.querySelectorAll('.delete-form');

      deleteForms.forEach(form => {
          form.addEventListener('submit', function (e) {
              e.preventDefault();

              Swal.fire({
                  title: 'Are you sure?',
                  text: "This action cannot be undone.",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonText: 'Yes, delete it!',
                  denyButtonText: `Cancel`,
                  reverseButtons: true
              }).then((result) => {
                  if (result.isConfirmed) {
                      form.submit();
                  } else if (result.isDenied) {
                      Swal.fire('Deletion canceled', '', 'info');
                  }
              });
          });
      });
  });
</script>


</body>
</html>
