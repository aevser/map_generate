<?php

namespace MapGenerate\Interface;

interface FormatsInterface
{
    public function generate(array $pages): string;
}