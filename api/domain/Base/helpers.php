<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

function requestFromFrontend(): bool
{
    $domain = request()->headers->get('referer') ?: request()->headers->get('origin');

    if (is_null($domain)) {
        return false;
    }

    $domain = Str::replaceFirst('https://', '', $domain);
    $domain = Str::replaceFirst('http://', '', $domain);
    $domain = Str::endsWith($domain, '/') ? $domain : "{$domain}/";

    $stateful = array_filter(config('sanctum.stateful', []));

    return Str::is(Collection::make($stateful)->map(fn($uri): string => trim((string) $uri) . '/*')->all(), $domain);
}

function getFixtureJson(string $path, string $file, bool $decode = true): string | array
{
    $path = base_path() . "/tests/Fixtures/{$path}";

    $arquivo = file_get_contents("{$path}/{$file}.json");

    return $decode ? json_decode($arquivo, true) : $arquivo;
}
