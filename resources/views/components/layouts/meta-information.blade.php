<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="apple-touch-icon" href="{{ asset('images/favicon.png') }}" type="image/png">
<link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png">

<!-- Organization information  -->
<meta property="og:image" content="{{ asset('images/logo-512x512.png') }}" />
<meta property="og:image:type" content="image/png" />
<meta property="og:image:width" content="512" />
<meta property="og:image:height" content="512" />
<meta property="og:title" content="{{ config('app.name') }}" />
<meta property="og:type" content="Spices Store" />
<meta property="og:description" content="{{ config('app.description') }}" />
<meta property="og:url" content="{{ config('app.url') }}" />

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

@push('styles')
    @if (file_exists(public_path('css/app.cs')))
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @else
        @vite(['resources/css/app.css'])
    @endif
@endpush

@push('scripts')
    @if (file_exists(public_path('js/app.js')))
        <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    @else
        @vite(['resources/js/app.js'])
    @endif
@endpush
