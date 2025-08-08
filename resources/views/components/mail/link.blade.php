@props(['title', 'url'])

<a href="{{ $url }}" class="footer-link" target="_blank" {{ $attributes->merge(['style' => 'display: inline-block; text-indent: 0px; text-decoration: none; font-weight: bold; color: #f97316;']) }}>{{ $title }}</a>
