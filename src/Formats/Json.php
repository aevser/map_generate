<?php

namespace MapGenerate\Formats;

use MapGenerate\Interface\FormatsInterface;

class Json implements FormatsInterface
{
    /**
     * Генерация файла в формате JSON
     *
     * @param array $pages - массив страниц для генерации
     * @return string - содержимое в формате JSON
     */
    public function generate(array $pages): string
    {
        return json_encode($pages, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }
}