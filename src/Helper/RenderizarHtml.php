<?php

namespace Lok\CofeeBreaks\Helper;

trait RenderizarHtml
{
    public function renderizarHtml(string $caminhoTemplate, array $dados): string
    {
        extract($dados);
        ob_start();
        require __DIR__ . '/../View/' . $caminhoTemplate;
        $html = ob_get_clean();

        return $html;
    }
}