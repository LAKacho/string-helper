<?php

declare(strict_types=1);

namespace Lakacho\StringHelper;

final class Slugger
{
    private const MAP = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd',
        'е' => 'e', 'ё' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i',
        'й' => 'y', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n',
        'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't',
        'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'ts', 'ч' => 'ch',
        'ш' => 'sh', 'щ' => 'sch', 'ъ' => '', 'ы' => 'y', 'ь' => '',
        'э' => 'e', 'ю' => 'yu', 'я' => 'ya',
    ];

    /**
     * Transliterates Cyrillic characters to Latin, keeping other characters as is.
     */
    public function transliterate(string $text): string
    {
        return strtr(mb_strtolower($text, 'UTF-8'), self::MAP);
    }

    /**
     * Builds a URL-friendly slug: "Привет, мир!" -> "privet-mir".
     */
    public function slugify(string $text, string $separator = '-'): string
    {
        $latin = $this->transliterate($text);
        $slug = preg_replace('/[^a-z0-9]+/', $separator, $latin) ?? '';

        return trim($slug, $separator);
    }
}
