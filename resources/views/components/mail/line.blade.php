@props(['content'])
<tr>
    <td style="text-align:justify;">
        <p {{ $attributes->merge(['style' => 'text-indent: 30px; font-size: 16px; margin: 5px 0;']) }}>
            {{ $content ?? $slot }}
        </p>
    </td>
</tr>
