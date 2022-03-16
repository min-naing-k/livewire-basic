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
</head>

<body>

  <div class="max-w-7xl mx-auto">
    <h2 class="text-4xl">{{ $post->title }}</h2>
    <div class="mt-8">
      {{ $post->content }}
      <div class="h-96 mt-8">Scroll down for comments...</div>
      <div class="h-96"></div>
      <div class="h-96"></div>
    </div>

    <hr>

    <livewire:comments-section :post="$post" />
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
  @livewireScripts
</body>

</html>
