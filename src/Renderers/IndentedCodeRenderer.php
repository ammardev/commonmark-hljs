<?php

namespace Ammardev\CommonMarkHighlightJs\Renderers;

use Ammardev\CommonMarkHighlightJs\HighlightJsProcessor;
use League\CommonMark\Extension\CommonMark\Renderer\Block\IndentedCodeRenderer as BaseIndentedCodeRenderer;
use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

class IndentedCodeRenderer implements NodeRendererInterface
{
    private BaseIndentedCodeRenderer $baseIndentedCodeRenderer;

    public function __construct()
    {
        $this->baseIndentedCodeRenderer = new BaseIndentedCodeRenderer();
    }

    public function render(Node $node, ChildNodeRendererInterface $childRenderer): HtmlElement
    {
        /** @var HtmlElement $element */
        $element = $this->baseIndentedCodeRenderer->render($node, $childRenderer);

        $element->setContents(
            HighlightJsProcessor::highlight($element->getContents())
        );

        return $element;
    }
}
