<?php

declare(strict_types=1);

namespace Lakacho\StringHelper\Tests;

use Lakacho\StringHelper\Slugger;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class SluggerTest extends TestCase
{
    public function testTransliterate(): void
    {
        $this->assertSame('privet', (new Slugger())->transliterate('Привет'));
    }

    #[DataProvider('slugProvider')]
    public function testSlugify(string $input, string $expected): void
    {
        $this->assertSame($expected, (new Slugger())->slugify($input));
    }

    public static function slugProvider(): array
    {
        return [
            'cyrillic' => ['Привет, мир!', 'privet-mir'],
            'mixed' => ['Hello Мир 2024', 'hello-mir-2024'],
            'trim' => ['  --Щука--  ', 'schuka'],
            'empty' => ['', ''],
        ];
    }

    public function testCustomSeparator(): void
    {
        $this->assertSame('a_b', (new Slugger())->slugify('a b', '_'));
    }
}
