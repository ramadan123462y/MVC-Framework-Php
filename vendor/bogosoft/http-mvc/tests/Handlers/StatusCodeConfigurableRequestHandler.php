<?php

declare(strict_types=1);

namespace Bogosoft\Http\Mvc\Tests\Handlers;

use GuzzleHttp\Psr7\Response;
use Psr\Http\Message\ResponseInterface as IResponse;
use Psr\Http\Message\ServerRequestInterface as IRequest;
use Psr\Http\Server\RequestHandlerInterface as IRequestHandler;

final class StatusCodeConfigurableRequestHandler implements IRequestHandler
{
    function __construct(private int $code)
    {
    }

    /**
     * @inheritDoc
     */
    function handle(IRequest $request): IResponse
    {
        return new Response($this->code);
    }
}
