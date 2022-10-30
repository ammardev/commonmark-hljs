<?php

namespace Ammardev\CommonMarkHighlightJs;

use Symfony\Component\Process\Process;

class HighlightJsProcessor
{
    public static function highlight(string $code): string
    {
        $code = strip_tags($code);
        $code = htmlspecialchars_decode($code);

        $process = new Process(['node', 'hljs-cli.js', $code], __DIR__ . '/../resources');

        $processOutput = '';

        $captureOutput = function ($type, $line) use (&$processOutput) {
            $processOutput .= $line;
        };

        $process->setTimeout(null)
            ->run($captureOutput);

        return $processOutput;
    }
}