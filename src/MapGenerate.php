<?php

namespace MapGenerate;

use Exception;
use MapGenerate\Exceptions\InvalidException;
use MapGenerate\Exceptions\WriteException;
use MapGenerate\Formats\Csv;
use MapGenerate\Formats\Json;
use MapGenerate\Formats\Xml;

class MapGenerate
{
    /**
     * @param array $pages - массив страниц для генерации файла
     * @param string $file_type - тип файла (xml, json, csv)
     * @param string $file_path - путь для сохранения сгенерированного файла
     */

    public function __construct(
        protected array $pages,
        protected string $file_type,
        protected string $file_path
    )

    {
        $this->prepareDirectory();
    }

    /**
     * Генерация фалйа
     */

    public function generate(): void
    {
        $formats = $this->getFormats();
        $site_map_content = $formats->generate($this->pages);

        if (!file_put_contents($this->file_path, $site_map_content)) {
            throw new WriteException('Ошибка записи по пути: ' . $this->file_path);
        }
    }

    /**
     * Подготавливаем директорию
     */

    private function prepareDirectory(): void
    {
        $directory = dirname($this->file_path);

        if (!is_dir($directory) && mkdir($directory, 0755, true)) {
            throw new WriteException('Ошибка записи файла по пути: ' . $this->file_path);
        }
    }

    /**
     * Определяем формат для генерации в зависимости от указанного типа
     */

    private function getFormats()
    {
        return match ($this->file_type) {
            'xml' => new Xml(),
            'csv' => new Csv(),
            'json' => new Json(),

            default => throw new InvalidException('Неверный формат: ' . $this->file_type)
        };
    }
}