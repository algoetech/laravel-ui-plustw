<?php

namespace Algoetech\LaravelUi\Presets;

use Illuminate\Filesystem\Filesystem;

class Tailwind extends Preset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::updatePackages();
        static::updateViteConfiguration();
        static::updateSass();
        static::updateBootstrapping();
        static::removeNodeModules();
    }

    /**
     * Update the given package array.
     *
     * @param  array  $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
            "@tailwindcss/aspect-ratio" => "^0.4.2",
            "@tailwindcss/forms" => "^0.5.7",
            "@tailwindcss/typography" => "^0.5.10",
            "autoprefixer" => "^10.4.16",
            "postcss" => "^8.4.31",
            "tailwindcss" => "^3.3.5",
        ] + $packages;
    }

    /**
     * Update the Vite configuration.
     *
     * @return void
     */
    protected static function updateViteConfiguration()
    {
        copy(__DIR__.'/tailwind-stubs/vite.config.js', base_path('vite.config.js'));

    }


    /**
     * Add the postCss configuration file.
     *
     * @return void
     */
    protected static function addPostCssConfiguration()
    {
        copy(__DIR__.'/tailwind-stubs/postcss.config.js', base_path('postcss.config.js'));
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected static function updateSass()
    {
        (new Filesystem)->ensureDirectoryExists(resource_path('sass'));

        copy(__DIR__.'/tailwind-stubs/app.scss', resource_path('sass/app.scss'));
    }

    /**
     * Update the bootstrapping files.
     *
     * @return void
     */
    protected static function updateBootstrapping()
    {
        copy(__DIR__.'/tailwind-stubs/app.js', resource_path('js/app.js'));
    }

}
