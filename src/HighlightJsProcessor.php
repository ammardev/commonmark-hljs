<?php

namespace Ammardev\CommonMarkHighlightJs;

class HighlightJsProcessor
{
    public static function highlight(string $code): string
    {
        exec('node ../resources/hljs-cli.js ' . $code . ' 2>&1', $output, $test);
        return $output;
    }
}