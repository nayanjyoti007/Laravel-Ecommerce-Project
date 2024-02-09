<?php

namespace App\Services;


class SlugGenerator
{

    public static function generateSlug(string $title)
    {

        $slug = str_replace("&", "and", $title);
        $slug = preg_replace('/[^a-zA-Z0-9]+/', '-', $slug);
        $slug = preg_replace('/^[\-]/', '', $slug);
        $slug = preg_replace('/[\-]$/', '', $slug);
        $slug = strtolower($slug);

        return $slug;
    }
}
