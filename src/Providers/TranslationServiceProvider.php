<?php

namespace Hito\Platform\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Translatable\Facades\Translatable;

class TranslationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Translatable::fallback(fallbackLocale: config('translatable.fallback_locale'));

        \Cache::remember('translations', now()->addDay(), function () {
            $translations = collect(); // @phpstan-ignore-line

            foreach (config('app.available_locales', []) as $locale => $label) {
                $translations[$locale] = $this->getTranslations($locale);
            }

            return $translations;
        });
    }

    private function getTranslations(string $locale): array
    {
        return [
            'php' => [],
            'json' => [],
        ];
    }
}
