@props(['content'])
<tr>
    <td>
        <table width="100%">
            <tr>
                <td style="text-align: center; padding: 20px 0;">
                    {{ $slot }}
                </td>
            </tr>
        </table>
    </td>
</tr>
