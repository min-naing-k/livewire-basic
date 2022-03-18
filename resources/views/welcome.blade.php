<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ config('app.name') }}</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Alpine.js -->
  <script defer src="https://unpkg.com/alpinejs@3.9.1/dist/cdn.min.js"></script>

  <!-- Taggle.js -->
  {{-- <script src="https://unpkg.com/taggle/src/taggle.js" defer></script> --}}

  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

  <!-- Styles -->
  @livewireStyles

  <style>
    .textarea {
      width: 100%;
      height: 300px;
      border: 1px solid red;
      padding: 8px;
    }

    .taggle_list {
      padding: 0;
      margin: 0;
      line-height: 2.5;
      width: 100%;
    }

    .taggle_input {
      border: none;
      outline: none;
      font-size: 16px;
      font-weight: 300;
    }

    .taggle_list li {
      display: inline;
      vertical-align: baseline;
      white-space: nowrap;
      font-weight: 500;
      margin-bottom: 5px;
    }

    .taggle_list .taggle {
      margin-right: 8px;
      background: #E2E1DF;
      padding: 5px 10px;
      border-radius: 3px;
      position: relative;
      cursor: pointer;
      transition: all .3s;
      -webkit-animation-duration: 1s;
      animation-duration: 1s;
      -webkit-animation-fill-mode: both;
      animation-fill-mode: both;
    }

    .taggle_list .taggle_hot {
      background: #cac8c4;
    }

    .taggle_list .taggle .close {
      font-size: 1.1rem;
      position: absolute;
      top: 10px;
      right: 3px;
      text-decoration: none;
      padding: 0;
      line-height: 0.5;
      color: #ccc;
      color: rgba(0, 0, 0, 0.2);
      padding-bottom: 4px;
      display: inline-block;
      opacity: 0;
      pointer-events: none;
      border: 0;
      background: none;
      cursor: pointer;
    }

    .taggle_list .taggle:hover {
      padding: 5px;
      padding-right: 15px;
      background: #ccc;
      transition: all .3s;
    }

    .taggle_list .taggle:hover>.close {
      opacity: 1;
      pointer-events: auto;
    }

    .taggle_list .taggle .close:hover {
      color: #990033;
    }

    .taggle_placeholder {
      position: absolute;
      color: #CCC;
      top: 24px;
      left: 16px;
      transition: opacity, .25s;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    .taggle_input {
      padding: 8px;
      padding-left: 0;
      margin-top: -5px;
      background: none;
      max-width: 100%;
    }

    .taggle_input:focus {
      box-shadow: none !important
    }

    .taggle_sizer {
      padding: 0;
      margin: 0;
      position: absolute;
      top: -500px;
      z-index: -1;
      visibility: hidden;
    }
  </style>
</head>

<body>

  <livewire:contact-form />

  <x-navbar />

  <livewire:data-table />

  <x-posts :posts="$posts" />

  {{-- <livewire:polling-example /> --}}

  <h2>Event Example</h2>
  <livewire:tags-component />
  <div class="h-96"></div>

  @livewireScripts
  <script src="{{ asset('js/app.js') }}"></script>
  <script src="{{ asset('js/taggle.js') }}"></script>
</body>

</html>
