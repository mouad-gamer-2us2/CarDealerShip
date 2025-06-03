<div>
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
</head>

<body>
  <x-user-nav /> {{-- Barre de navigation utilisateur --}}
 

  <div class="container mt-4">
    {{ $slot }}
  </div>

  <x-footer /> {{-- Footer réutilisé (si commun aux deux) --}}

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
          title: 'Erreur de validation',
          text: 'Veuillez vérifier les champs du formulaire.',
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
                    title: 'Êtes-vous sûr ?',
                    text: "Cette action est irréversible.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Oui, supprimer !',
                    denyButtonText: `Annuler`,
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    } else if (result.isDenied) {
                        Swal.fire('Suppression annulée', '', 'info');
                    }
                });
            });
        });
    });
  </script>

</body>
</html>

</div>