<?php

namespace Bogosoft\Http\Mvc;

use Psr\Http\Message\ServerRequestInterface as IRequest;

/**
 * Represents a strategy for resolving an action context into an executable
 * action.
 *
 * @package Bogosoft\Http\Mvc
 */
interface IActionContextActivator
{
    /**
     * Attempt to resolve an action from a given action context and HTTP
     * request.
     *
     * @param  ActionContext $context An action context.
     * @param  IRequest      $request An HTTP request.
     * @return IAction|null           The result of attempting to resolve an
     *                                action from the given action context
     *                                and HTTP request. Implementations SHOULD
     *                                return {@see null} if the current
     *                                activator cannot activate the given
     *                                action context.
     */
    function activateContext(ActionContext $context, IRequest $request): ?IAction;
}
