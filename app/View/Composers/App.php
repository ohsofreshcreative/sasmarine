<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Dane dostępne we wszystkich widokach Blade.
     */
    public function with(): array
    {
        $acfReady = did_action('acf/init');

        return [
            'siteName' => $this->siteName(),
            'logo' => $acfReady ? get_field('logo', 'option') : null,
            'logo_footer' => $acfReady ? get_field('logo_footer', 'option') : null,
            'footer_contact' => $acfReady ? get_field('footer_contact', 'option') : null,
        ];
    }

    /**
     * Zwraca nazwę strony.
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }
}