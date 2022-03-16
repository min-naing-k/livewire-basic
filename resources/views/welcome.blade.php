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

  <livewire:contact-form />

  <x-navbar />

  <livewire:data-table />

  <div class="my-8">
    <h2 class="text-lg font-semibold mt-4">Livewire Blog Posts w/ Comments</h2>

    <ul class="list-disc mt-4">
      @foreach ($posts as $post)
        <li><a href="{{ route('post.show', $post) }}" class="text-blue-600">{{ $post->title }}</a></li>
      @endforeach
    </ul>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
  @livewireScripts
</body>

</html>
