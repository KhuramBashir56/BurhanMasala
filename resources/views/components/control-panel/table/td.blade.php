@props(['content'])
<td {{ $attributes->merge(['class' => 'p-3 font-semibold']) }}>{{ $content ?? $slot }}</td>
