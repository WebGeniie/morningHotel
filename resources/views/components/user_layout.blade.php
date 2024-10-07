<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Morning Hotel</title>
  
  @vite('resources/css/app.css');
  {{-- <script src="//unpkg.com/alpine.js" defer></script> --}}
  
</head>

<body class="bg-slate-200 font-[poppins]">
  <x-admin-sidebar />
  <x-admin-navbar />
  {{ $slot }}
</body>
</html>