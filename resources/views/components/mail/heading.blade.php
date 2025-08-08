@props(['content', 'heading' => 'h1'])
<tr>
    <td>
        <{{ $heading }} {{ $attributes->merge(['style' => 'font-weight: bold;']) }}>
            {{ $content }}
            </{{ $heading }}>
    </td>
</tr>
