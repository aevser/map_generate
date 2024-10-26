<?php

namespace MapGenerate\Formats;

use MapGenerate\Interface\FormatsInterface;
use SimpleXMLElement;

class Xml implements FormatsInterface
{
    /**
     * Генерация файла в формате XML
     *
     * @param array $pages - массив страниц для генерации
     * @return string - содержимое в формате XML
     */

    public function generate(array $pages): string
    {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><urlset></urlset>');
        $xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach ($pages as $page) {
            $xml->addChild('loc', $page['loc']);
            $xml->addChild('lastmod', $page['lastmod']);
            $xml->addChild('priority', $page['priority']);
            $xml->addChild('changefreq', $page['changefreq']);
        }

        return $xml->asXML();
    }
}