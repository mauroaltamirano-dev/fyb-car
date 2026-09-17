@props(['branch', 'variant' => 'default'])

<article {{ $attributes->class(['location-card', 'location-card--footer' => $variant === 'footer']) }}>
    <h3>{{ $branch['name'] }}</h3>
    <p class="location-card__address">
        @component('components.icon', ['name' => 'location'])
        @endcomponent
        <span>{{ $branch['address'] }}</span>
    </p>
    <ul class="location-card__contacts" aria-label="Números de WhatsApp">
        @foreach ($branch['contacts'] as $contact)
            @component('components.contact-actions', ['contact' => $contact])
            @endcomponent
        @endforeach
    </ul>
</article>
