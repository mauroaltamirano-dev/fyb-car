@props(['contact'])

<li class="contact-number">
    <a href="https://wa.me/{{ ltrim($contact['e164'], '+') }}" aria-label="Escribir por WhatsApp al {{ $contact['display'] }}">{{ $contact['display'] }}</a>
</li>
