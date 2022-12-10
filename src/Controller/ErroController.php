<?php

namespace Lok\CofeeBreaks\Controller;


use Lok\CofeeBreaks\Helper\RenderizarHtml;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class ErroController implements RequestHandlerInterface
{
    use RenderizarHtml;

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->renderizarHtml('erro/erro.html', []);

        return new Response(404, [], $html);
    }
}