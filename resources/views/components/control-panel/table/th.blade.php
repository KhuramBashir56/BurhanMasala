@props(['content'])
<th {{ $attributes->merge(['class' => 'p-3 whitespace-nowrap']) }}>{{ $content ?? $slot }}</th>
