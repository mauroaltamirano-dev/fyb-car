<?php

use Illuminate\Foundation\Testing\TestCase;

final class WelcomePageTest extends TestCase
{
    public function test_public_landing_page_renders_its_core_sections(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('FyB | Mecánica y servicio integral')
            ->assertSee('Servicios principales')
            ->assertSee('¿Por qué FyB?')
            ->assertSee('Cómo trabajamos')
            ->assertSee('¿Necesitás revisar tu vehículo?')
            ->assertSee('Encontranos')
            ->assertSee('Tu vehículo en buenas manos.');
    }

    public function test_landing_page_exposes_accessible_navigation_and_local_assets(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('Saltar al contenido')
            ->assertSee('data-header', false)
            ->assertSee('aria-expanded="false"', false)
            ->assertSee('aria-controls="main-navigation"', false)
            ->assertSee('Abrir menú principal')
            ->assertDontSee('aria-current=', false)
            ->assertSee('css/landing.css')
            ->assertSee('js/landing.js')
            ->assertSee('images/brand/fyb-logo-red-v1-180.webp')
            ->assertSee('<picture>', false);
    }

    public function test_landing_page_generates_https_assets_behind_render_proxy(): void
    {
        $this->withServerVariables(['REMOTE_ADDR' => '10.0.0.10'])
            ->withHeaders([
                'X-Forwarded-Host' => 'fyb-car-preview.onrender.com',
                'X-Forwarded-Port' => '443',
                'X-Forwarded-Proto' => 'https',
            ])
            ->get('/')
            ->assertOk()
            ->assertSee('href="https://fyb-car-preview.onrender.com/css/landing.css"', false)
            ->assertSee('src="https://fyb-car-preview.onrender.com/js/landing.js"', false)
            ->assertSee('src="https://fyb-car-preview.onrender.com/images/brand/fyb-logo-red-v1-180.webp"', false)
            ->assertDontSee('http://fyb-car-preview.onrender.com/', false);
    }

    public function test_landing_page_uses_red_led_palette_without_pink_tokens(): void
    {
        $stylesheet = file_get_contents(public_path('css/landing.css'));

        self::assertIsString($stylesheet);
        self::assertMatchesRegularExpression('/--color-brand-action:\s*#[0-9a-f]{6};/i', $stylesheet);
        self::assertMatchesRegularExpression('/--color-brand-dark:\s*#[0-9a-f]{6};/i', $stylesheet);
        self::assertStringContainsString('--color-brand-bright:', $stylesheet);
        self::assertStringNotContainsString('brand-on-dark', $stylesheet);
        self::assertStringNotContainsString('brand-soft', $stylesheet);
        self::assertStringNotContainsString('#ffc6cb', strtolower($stylesheet));
        self::assertStringNotContainsString('#fff0f1', strtolower($stylesheet));
    }

    public function test_header_is_sticky_white_and_mobile_menu_remains_progressive(): void
    {
        $stylesheet = file_get_contents(public_path('css/landing.css'));
        $script = file_get_contents(public_path('js/landing.js'));

        self::assertIsString($stylesheet);
        self::assertIsString($script);
        self::assertStringContainsString('background: #fff;', $stylesheet);
        self::assertStringContainsString('.menu-toggle__icon span:nth-child(2)', $stylesheet);
        self::assertStringContainsString('.js .site-nav[data-open]', $stylesheet);
        self::assertStringNotContainsString('data-scrolled', $script);
        self::assertStringContainsString("toggle.setAttribute('aria-expanded', 'true')", $script);
        self::assertStringContainsString("event.key === 'Escape'", $script);
        self::assertStringContainsString('scroll-padding-top: var(--header-height);', $stylesheet);
        self::assertStringNotContainsString('scroll-margin-top:', $stylesheet);
    }

    public function test_landing_page_renders_two_branches_with_whatsapp_only_contacts(): void
    {
        $response = $this->get('/')->assertOk();
        $branches = config('fyb.branches');

        self::assertCount(2, $branches);
        self::assertNull(config('fyb.public_contact'));

        foreach ($branches as $branch) {
            $response
                ->assertSee($branch['name'])
                ->assertSee($branch['short_name'])
                ->assertSee($branch['address']);

            foreach ($branch['contacts'] as $contact) {
                $whatsappNumber = ltrim($contact['e164'], '+');
                $response
                    ->assertSee($contact['display'])
                    ->assertSee('href="https://wa.me/'.$whatsappNumber.'"', false);
            }
        }

        $response
            ->assertSee('class="location-card"', false)
            ->assertSee('class="contact-number"', false)
            ->assertSee('href="#ubicaciones">Ver contactos</a>', false)
            ->assertDontSee('href="tel:', false)
            ->assertDontSee('Llamar')
            ->assertDontSee('Horarios pendientes')
            ->assertDontSee('Número pendiente');
    }
}
