<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>UM beli beli V2</title>
@vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-white text-gray-900">
<x-header />
<main class="max-w-[1280px] mx-auto px-4 py-8">
@yield('content')
</main>
<x-footer />
</body>
</html>
