@props(['title'])
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{$title}}</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  {{-- Stylesheet --}}
  <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>

<body>

    {{-- Nav bar --}}
    <x-nav1 />

    {{$slot}}

    {{-- footer --}}
    <x-footer />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>