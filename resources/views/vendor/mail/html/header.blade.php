<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Rm-automotive')
<img src="https://www.rm-autodalys.lt/logo.png" class="logo" alt="Rm-automotive" style="width: 80%; height: 80%">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
