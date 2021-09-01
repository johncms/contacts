<?php

/**
 * This file is part of JohnCMS Content Management System.
 *
 * @copyright JohnCMS Community
 * @license   https://opensource.org/licenses/GPL-3.0 GPL-3.0
 * @link      https://johncms.com JohnCMS Project
 */

use Auth\Controllers\LoginController;
use Auth\Middlewares\UnauthorizedUserMiddleware;
use League\Route\Router;

/**
 * @psalm-suppress UndefinedInterfaceMethod
 */
return function (Router $router) {
    $router->get('/contacts[/]', [LoginController::class, 'index'])->setName('contacts.index');
};
