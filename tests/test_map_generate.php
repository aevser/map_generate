<?php

require 'vendor/autoload.php';

use MapGenerate\Exceptions\WriteException;
use MapGenerate\MapGenerate;
use MapGenerate\Exceptions\InvalidException;

$pages = [
    [
        'loc' => 'https://avi-zaimy-pod-zalog.ru/',
        'lastmod' => '2020-12-14',
        'priority' => '1.0',
        'changefreq' => 'daily',
    ],
    [
        'loc' => 'https://avi-zaimy-pod-zalog.ru/news',
        'lastmod' => '2020-12-10',
        'priority' => '0.5',
        'changefreq' => 'daily',
    ],
    [
        'loc' => 'https://avi-zaimy-pod-zalog.ru/about',
        'lastmod' => '2020-12-07',
        'priority' => '0.1',
        'changefreq' => 'weekly',
    ],
    [
        'loc' => 'https://avi-zaimy-pod-zalog.ru/products',
        'lastmod' => '2020-12-12',
        'priority' => '0.5',
        'changefreq' => 'daily',
    ],
    [
        'loc' => 'https://avi-zaimy-pod-zalog.ru/products/ps5',
        'lastmod' => '2020-12-11',
        'priority' => '0.1',
        'changefreq' => 'weekly',
    ],
    [
        'loc' => 'https://avi-zaimy-pod-zalog.ru/products/xbox',
        'lastmod' => '2020-12-12',
        'priority' => '0.1',
        'changefreq' => 'weekly',
    ],
    [
        'loc' => 'https://avi-zaimy-pod-zalog.ru/products/wii',
        'lastmod' => '2020-12-11',
        'priority' => '0.1',
        'changefreq' => 'weekly',
    ],
];

try {
    $generator = new MapGenerate($pages, 'xml', __DIR__ . '/sitemaps/sitemap.xml');
    $generator->generate();
    echo "XML карта сайта успешно создана.\n";
} catch (WriteException $e) {
    echo "Ошибка записи файла: " . $e->getMessage() . "\n";
} catch (InvalidException $e) {
    echo "Неверные данные: " . $e->getMessage() . "\n";
}

try {
    $generator = new MapGenerate($pages, 'csv', __DIR__ . '/sitemaps/sitemap.csv');
    $generator->generate();
    echo "CSV карта сайта успешно создана.\n";
} catch (WriteException $e) {
    echo "Ошибка записи файла: " . $e->getMessage() . "\n";
} catch (InvalidException $e) {
    echo "Неверные данные: " . $e->getMessage() . "\n";
}

try {
    $generator = new MapGenerate($pages, 'json', __DIR__ . '/sitemaps/sitemap.json');
    $generator->generate();
    echo "JSON карта сайта успешно создана.\n";
} catch (WriteException $e) {
    echo "Ошибка записи файла: " . $e->getMessage() . "\n";
} catch (InvalidException $e) {
    echo "Неверные данные: " . $e->getMessage() . "\n";
}