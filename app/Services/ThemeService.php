<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Contracts\Routing\UrlGenerator;

/**
 * Class ThemeService
 * @package Piboutique\SimpleCMS\Services
 */
class ThemeService
{
    /**
     * @param $path
     * @return UrlGenerator|string
     */
    public function findAsset($path): string|UrlGenerator
    {
        if (!File::exists(public_path('dist/manifest.json'))) {
            return url($path);
        }

        $manifest = File::get(public_path('dist/manifest.json'));
        $manifest = json_decode($manifest, true);
        return $manifest[$path] ?? "";
    }
}
