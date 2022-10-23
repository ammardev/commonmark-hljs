<?php

namespace Ammardev\CommonMarkHighlightJs\Renderers;

use Ammardev\CommonMarkHighlightJs\HighlightJsProcessor;
use League\CommonMark\Extension\CommonMark\Renderer\Block\FencedCodeRenderer as BaseFencedCodeRenderer;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

class FencedCodeRenderer implements NodeRendererInterface
{
    private BaseFencedCodeRenderer $baseFencedCodeRenderer;

    public function __construct()
    {
        $this->baseFencedCodeRenderer = new BaseFencedCodeRenderer();
    }

    public function render(Node $node, ChildNodeRendererInterface $childRenderer): HtmlElement
    {
        /** @var HtmlElement $element */
        $element = $this->baseFencedCodeRenderer->render($node, $childRenderer);

        $element->setContents(
            HighlightJsProcessor::highlight($element->getContents())
        );

        return $element;
    }
}
