<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mecánica, mantenimiento y atención profesional para tu vehículo en FyB.">
    <meta name="theme-color" content="#ffffff">
    <title>FyB | Mecánica y servicio integral</title>
    <link rel="stylesheet" href="{{ asset('css/landing.css') }}">
    <script>document.documentElement.classList.add('js');</script>
    <script src="{{ asset('js/landing.js') }}" defer></script>
</head>
<body>
    <a class="skip-link" href="#contenido">Saltar al contenido</a>

    <header class="site-header" data-header>
        <div class="container site-header__inner">
            <a class="brand" href="#inicio" aria-label="FyB Mecánica, ir al inicio">
                <img
                    class="brand__logo"
                    src="{{ asset('images/brand/fyb-logo-red-v1-180.webp') }}"
                    srcset="{{ asset('images/brand/fyb-logo-red-v1-180.webp') }} 1x, {{ asset('images/brand/fyb-logo-red-v1-360.webp') }} 2x"
                    alt=""
                    width="180"
                    height="93"
                >
            </a>

            <button class="menu-toggle" type="button" aria-expanded="false" aria-controls="main-navigation" data-menu-toggle>
                <span class="sr-only" data-menu-label>Abrir menú principal</span>
                <span class="menu-toggle__icon" aria-hidden="true"><span></span><span></span><span></span></span>
            </button>

            <nav class="site-nav" id="main-navigation" aria-label="Navegación principal" data-menu>
                <ul class="site-nav__links">
                    <li><a href="#inicio">Inicio</a></li>
                    <li><a href="#servicios">Servicios</a></li>
                    <li><a href="#turnos">Turnos</a></li>
                    <li><a href="#nosotros">Nosotros</a></li>
                    <li><a href="#ubicaciones">Ubicaciones</a></li>
                </ul>
                <a class="button button--primary site-nav__cta" href="#turnos">Sacar turno</a>
            </nav>
        </div>
    </header>

    <main id="contenido">
        <section class="hero" id="inicio" aria-labelledby="hero-title">
            <div class="hero__media" aria-hidden="true">
                <picture>
                    <source
                        type="image/webp"
                        srcset="{{ asset('images/landing/hero-workshop-placeholder-640.webp') }} 640w, {{ asset('images/landing/hero-workshop-placeholder-1024.webp') }} 1024w, {{ asset('images/landing/hero-workshop-placeholder-1586.webp') }} 1586w"
                        sizes="100vw"
                    >
                    <img src="{{ asset('images/landing/hero-workshop-placeholder-1024.webp') }}" alt="" width="1586" height="992" fetchpriority="high">
                </picture>
            </div>
            <div class="hero__shade" aria-hidden="true"></div>
            <div class="container hero__content">
                <p class="eyebrow eyebrow--light"><span></span> Servicio automotor integral</p>
                <h1 id="hero-title">Mecánica y servicio integral para tu vehículo.</h1>
                <p class="hero__lead">Mantenimiento, reparación y atención profesional para que vuelvas a la ruta con tranquilidad.</p>
                <div class="hero__actions">
                    <a class="button button--primary button--large" href="#turnos">Sacar turno</a>
                    <a class="button button--ghost button--large" href="#servicios">Ver servicios</a>
                </div>
                <ul class="trust-list" aria-label="Características del servicio">
                    <li><span aria-hidden="true">✓</span> Turnos online próximamente</li>
                    <li><span aria-hidden="true">✓</span> Atención personalizada</li>
                    <li><span aria-hidden="true">✓</span> Servicio integral</li>
                </ul>
            </div>
            <p class="image-note image-note--hero">Imagen provisoria</p>
        </section>

        <section class="section services" id="servicios" aria-labelledby="services-title">
            <div class="container">
                <div class="section-heading section-heading--split">
                    <div>
                        <p class="eyebrow"><span></span> Servicios principales</p>
                        <h2 id="services-title">Todo lo que tu vehículo necesita, en un mismo lugar.</h2>
                    </div>
                    <p>Resolvemos el mantenimiento y las reparaciones con una mirada integral, explicándote cada paso antes de avanzar.</p>
                </div>

                <div class="service-grid">
                    @php
                        $services = [
                            ['01', 'Mecánica general', 'Revisión y reparación de los sistemas esenciales de tu vehículo.', 'wrench'],
                            ['02', 'Mantenimiento', 'Servicios preventivos para cuidar el rendimiento y anticipar problemas.', 'drop'],
                            ['03', 'Diagnóstico', 'Evaluación técnica para encontrar el origen real de cada falla.', 'scan'],
                            ['04', 'Frenos y suspensión', 'Control de componentes fundamentales para una conducción segura.', 'brake'],
                            ['05', 'Servicio del vehículo', 'Una revisión completa y ordenada según las necesidades de tu unidad.', 'car'],
                        ];
                    @endphp

                    @foreach ($services as [$number, $name, $description, $icon])
                        <article class="service-card">
                            <div class="service-card__top">
                                <span class="service-card__number">{{ $number }}</span>
                                <svg class="service-card__icon" aria-hidden="true" viewBox="0 0 24 24">
                                    @switch($icon)
                                        @case('wrench')
                                            <path d="M14.7 6.3a4 4 0 0 0-5-5L12 3.6 9.6 6 7.3 3.7a4 4 0 0 0 5 5l-7.7 7.7a2 2 0 0 0 2.8 2.8z"/>
                                            @break
                                        @case('drop')
                                            <path d="M12 2S6.5 8.2 6.5 13a5.5 5.5 0 0 0 11 0C17.5 8.2 12 2 12 2Z"/><path d="M9.5 14.5a2.7 2.7 0 0 0 2.5 1.7"/>
                                            @break
                                        @case('scan')
                                            <path d="M4 8V5a1 1 0 0 1 1-1h3M16 4h3a1 1 0 0 1 1 1v3M20 16v3a1 1 0 0 1-1 1h-3M8 20H5a1 1 0 0 1-1-1v-3"/><path d="M8 12h8M12 8v8"/>
                                            @break
                                        @case('brake')
                                            <circle cx="12" cy="12" r="8"/><circle cx="12" cy="12" r="3"/><path d="M18 7.5h2.5v9H18"/>
                                            @break
                                        @default
                                            <path d="m5 16-1-3 2-5h12l2 5-1 3M7 16v2M17 16v2M4 13h16M8 12h.01M16 12h.01"/>
                                    @endswitch
                                </svg>
                            </div>
                            <h3>{{ $name }}</h3>
                            <p>{{ $description }}</p>
                            <a class="text-link" href="#como-trabajamos">Ver servicio <span aria-hidden="true">→</span></a>
                        </article>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section why" id="nosotros" aria-labelledby="why-title">
            <div class="container why__grid">
                <div class="why__visual">
                    <picture>
                        <source
                            type="image/webp"
                            srcset="{{ asset('images/landing/diagnostics-placeholder-480.webp') }} 480w, {{ asset('images/landing/diagnostics-placeholder-900.webp') }} 900w, {{ asset('images/landing/diagnostics-placeholder-1448.webp') }} 1448w"
                            sizes="(min-width: 75rem) 33rem, (min-width: 48rem) 43vw, 100vw"
                        >
                        <img src="{{ asset('images/landing/diagnostics-placeholder-900.webp') }}" alt="Mecánico realizando un diagnóstico electrónico en un vehículo" width="1448" height="1086" loading="lazy" decoding="async">
                    </picture>
                    <span class="image-note">Imagen provisoria</span>
                    <div class="why__caption"><strong>Diagnóstico primero.</strong><span>Decisiones con criterio.</span></div>
                </div>
                <div class="why__content">
                    <p class="eyebrow"><span></span> ¿Por qué FyB?</p>
                    <h2 id="why-title">Claridad técnica en cada decisión.</h2>
                    <p class="why__intro">Queremos que entiendas qué necesita tu vehículo y por qué. Sin vueltas, con atención cercana y trabajo responsable.</p>
                    <div class="feature-list">
                        <article>
                            <span>01</span>
                            <div><h3>Atención clara</h3><p>Te explicamos el diagnóstico y el trabajo necesario antes de comenzar.</p></div>
                        </article>
                        <article>
                            <span>02</span>
                            <div><h3>Trabajo profesional</h3><p>Seguimos un proceso ordenado, con criterio técnico y equipamiento adecuado.</p></div>
                        </article>
                        <article>
                            <span>03</span>
                            <div><h3>Seguimiento responsable</h3><p>Mantenemos una comunicación directa durante el servicio de tu vehículo.</p></div>
                        </article>
                    </div>
                </div>
            </div>
        </section>

        <section class="section process" id="como-trabajamos" aria-labelledby="process-title">
            <div class="container">
                <div class="section-heading section-heading--center">
                    <p class="eyebrow"><span></span> Cómo trabajamos</p>
                    <h2 id="process-title">Un proceso simple y transparente.</h2>
                    <p>Sabés qué pasa con tu vehículo desde que llega al taller hasta que vuelve a tus manos.</p>
                </div>
                <ol class="process-list">
                    <li><span class="process-list__number">01</span><h3>Reservás tu turno.</h3><p>Coordinamos el momento más conveniente para recibir tu vehículo.</p></li>
                    <li><span class="process-list__number">02</span><h3>Revisamos el vehículo.</h3><p>Evaluamos su estado y buscamos el origen de la necesidad.</p></li>
                    <li><span class="process-list__number">03</span><h3>Te informamos el trabajo.</h3><p>Explicamos qué encontramos y qué recomendamos hacer.</p></li>
                    <li><span class="process-list__number">04</span><h3>Realizamos el servicio.</h3><p>Avanzamos con el trabajo acordado y te mantenemos al tanto.</p></li>
                </ol>
            </div>
        </section>

        <section class="appointment" id="turnos" aria-labelledby="appointment-title">
            <div class="appointment__texture" aria-hidden="true"></div>
            <div class="container appointment__inner">
                <div>
                    <p class="eyebrow eyebrow--light"><span></span> Próximamente: turnos online</p>
                    <h2 id="appointment-title">¿Necesitás revisar tu vehículo?</h2>
                    <p>Reservá tu turno online de forma rápida. El sistema de turnos estará disponible en la próxima etapa.</p>
                </div>
                <span class="button button--light button--large button--disabled" aria-disabled="true">Sacar turno <small>Próximamente</small></span>
            </div>
        </section>

        <section class="section workshop" id="taller" aria-labelledby="workshop-title">
            <div class="container">
                <div class="section-heading section-heading--split">
                    <div>
                        <p class="eyebrow eyebrow--secondary"><span></span> Taller y trabajos</p>
                        <h2 id="workshop-title">El espacio donde cuidamos cada detalle.</h2>
                    </div>
                    <p>Esta galería está preparada para mostrar el taller y trabajos reales cuando el material definitivo esté disponible.</p>
                </div>
                <div class="workshop-grid">
                    <figure class="workshop-card workshop-card--wide">
                        <picture>
                            <source
                                type="image/webp"
                                srcset="{{ asset('images/landing/lift-inspection-placeholder-480.webp') }} 480w, {{ asset('images/landing/lift-inspection-placeholder-900.webp') }} 900w, {{ asset('images/landing/lift-inspection-placeholder-1448.webp') }} 1448w"
                                sizes="(min-width: 75rem) 44rem, (min-width: 48rem) 58vw, 100vw"
                            >
                            <img src="{{ asset('images/landing/lift-inspection-placeholder-900.webp') }}" alt="Inspección de la parte inferior de un vehículo elevado en el taller" width="1448" height="1086" loading="lazy" decoding="async">
                        </picture>
                        <figcaption><strong>Inspección técnica</strong><span>Imagen provisoria</span></figcaption>
                    </figure>
                    <figure class="workshop-card">
                        <picture>
                            <source
                                type="image/webp"
                                srcset="{{ asset('images/landing/brake-service-placeholder-480.webp') }} 480w, {{ asset('images/landing/brake-service-placeholder-900.webp') }} 900w, {{ asset('images/landing/brake-service-placeholder-1448.webp') }} 1448w"
                                sizes="(min-width: 75rem) 22rem, (min-width: 48rem) 34vw, 100vw"
                            >
                            <img src="{{ asset('images/landing/brake-service-placeholder-900.webp') }}" alt="Trabajo de mantenimiento sobre el sistema de frenos de un vehículo" width="1448" height="1086" loading="lazy" decoding="async">
                        </picture>
                        <figcaption><strong>Trabajo preciso</strong><span>Imagen provisoria</span></figcaption>
                    </figure>
                    <figure class="workshop-card workshop-card--text">
                        <blockquote>“Cada revisión empieza escuchando, observando y diagnosticando.”</blockquote>
                        <figcaption>Principio de trabajo FyB</figcaption>
                    </figure>
                </div>
            </div>
        </section>

        @php($branches = config('fyb.branches'))
        <section class="section location" id="ubicaciones" aria-labelledby="location-title">
            <div class="container location__grid">
                <div class="location__content">
                    <p class="eyebrow"><span></span> Encontranos</p>
                    <h2 id="location-title">Estamos cerca para ayudarte.</h2>
                    <p>Elegí la sucursal que necesitás y escribinos por WhatsApp a cualquiera de sus números.</p>
                </div>
                <div class="location__cards">
                    @foreach ($branches as $branch)
                        @component('components.location-card', ['branch' => $branch])
                        @endcomponent
                    @endforeach
                </div>
            </div>
        </section>

        <section class="final-cta" aria-labelledby="final-cta-title">
            <div class="container final-cta__inner">
                <div>
                    <p class="eyebrow eyebrow--light"><span></span> Atención FyB</p>
                    <h2 id="final-cta-title">Tu vehículo en buenas manos.</h2>
                    <p>Reservá un turno o consultanos por el servicio que necesitás.</p>
                </div>
                <div class="final-cta__actions">
                    <a class="button button--primary button--large" href="#turnos">Sacar turno</a>
                    <a class="button button--ghost button--large" href="#ubicaciones">Ver contactos</a>
                </div>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container site-footer__grid">
            <div class="site-footer__brand">
                <a class="brand brand--footer" href="#inicio" aria-label="FyB Mecánica, volver al inicio">
                    <img
                        class="brand__logo"
                        src="{{ asset('images/brand/fyb-logo-red-v1-180.webp') }}"
                        srcset="{{ asset('images/brand/fyb-logo-red-v1-180.webp') }} 1x, {{ asset('images/brand/fyb-logo-red-v1-360.webp') }} 2x"
                        alt=""
                        width="180"
                        height="93"
                        loading="lazy"
                        decoding="async"
                    >
                </a>
                <p>Mecánica, mantenimiento y atención profesional para tu vehículo.</p>
            </div>
            <div>
                <h2>Navegación</h2>
                <ul><li><a href="#servicios">Servicios</a></li><li><a href="#turnos">Turnos</a></li><li><a href="#nosotros">Nosotros</a></li><li><a href="#ubicaciones">Ubicaciones</a></li></ul>
            </div>
            <div class="site-footer__contact">
                <h2>Contacto</h2>
                @foreach ($branches as $branch)
                    <p><strong>{{ $branch['short_name'] }}</strong><br>
                        @foreach ($branch['contacts'] as $contact)
                            <a href="https://wa.me/{{ ltrim($contact['e164'], '+') }}" aria-label="Escribir por WhatsApp al {{ $contact['display'] }}">{{ $contact['display'] }}</a>@if (! $loop->last) <span aria-hidden="true"> / </span>@endif
                        @endforeach
                    </p>
                @endforeach
            </div>
            <div class="site-footer__locations">
                <h2>Sucursales</h2>
                @foreach ($branches as $branch)
                    <p><strong>{{ $branch['short_name'] }}</strong><br>{{ $branch['address'] }}</p>
                @endforeach
            </div>
        </div>
        <div class="container site-footer__bottom">
            <p>© {{ date('Y') }} FyB. Todos los derechos reservados.</p>
            <p>Sitio público en construcción.</p>
        </div>
    </footer>
</body>
</html>
