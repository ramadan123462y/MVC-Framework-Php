<?php

declare(strict_types=1);

namespace Bogosoft\Http\Mvc;

use Psr\Http\Message\ServerRequestInterface as IRequest;

/**
 * An implementation of the {@see IActionFilter} contract that delegates
 * action filters to a {@see callable} object.
 *
 * The delegate is expected to be of the form:
 *
 * - fn({@see IRequest}, {@see IAction}): {@see mixed}
 *
 * This class cannot be inherited.
 *
 * @package Bogosoft\Http\Mvc
 */
final class DelegatedActionFilter implements IActionFilter
{
    /** @var callable */
    private $delegate;

    /**
     * Create a new delegated action filter.
     *
     * @param callable $delegate An invokable object to which action
     *                           filtering will be delegated.
     */
    function __construct(callable $delegate)
    {
        $this->delegate = $delegate;
    }

    /**
     * @inheritDoc
     */
    function apply(IRequest $request, IAction $action)
    {
        return ($this->delegate)($request, $action);
    }
}
