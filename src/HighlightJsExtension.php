<?php

namespace Ammardev\CommonMarkHighlightJs;

use Ammardev\CommonMarkHighlightJs\Renderers\FencedCodeRenderer;
use Ammardev\CommonMarkHighlightJs\Renderers\IndentedCodeRenderer;
use League\CommonMark\Environment\EnvironmentBuilderInterface;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;
use League\CommonMark\Extension\ExtensionInterface;

final class HighlightJsExtension implements ExtensionInterface
{
    public function register(EnvironmentBuilderInterface $environment): void
    {
        $environment->addRenderer(FencedCode::class, new FencedCodeRenderer());
//        $environment->addRenderer(IndentedCode::class, new IndentedCodeRenderer());
    }
}
