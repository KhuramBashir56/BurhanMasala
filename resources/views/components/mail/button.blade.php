@props(['title', 'url'])

<a href="{{ $url }}" class="action-button" style="display: inline-block; background-color: #f97316; color: white; padding: 10px 18px; text-decoration: none; border-radius: 5px; margin: 0 5px" title="{{ $title }}" target="_blank" rel="noopener">{{ $title }}</a>
