<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  @livewireStyles

  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

  <script src="//unpkg.com/alpinejs" defer></script>

  <style>
    progress {
      border-radius: 7px;
      height: 12px;
    }

    progress::-webkit-progress-bar {
      background-color: lightgray;
      border-radius: 7px;
    }

    progress::-webkit-progress-value {
      background-color: blue;
      border-radius: 7px;
    }

  </style>
</head>

<body>

  <div class="max-w-7xl mx-auto my-4">
    <livewire:post-edit :post="$post" />
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
  @livewireScripts
</body>

</html>
