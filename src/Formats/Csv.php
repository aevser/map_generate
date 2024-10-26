<?php

namespace MapGenerate\Formats;

use MapGenerate\Interface\FormatsInterface;

class Csv implements FormatsInterface
{
    /**
     * Генерация файла в формате CSV
     *
     * @param array $pages - массив страниц для генерации
     * @return string - содержимое в формате CSV
     */
    public function generate(array $pages): string
    {
        $output = 'loc;lastmod;priority;changefreq\n';

        foreach ($pages as $page) {
            $output .= implode(';', [
                $page['loc'],
                $page['lastmod'],
                $page['priority'],
                $page['changefreq']
            ]) . '\n';
        }

        return $output;
    }
}