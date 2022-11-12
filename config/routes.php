<?php

declare(strict_types=1);

use Johncms\Contacts\Controllers\ContactsController;
use League\Route\Router;

return function (Router $router) {
    $router->get('/contacts[/]', [ContactsController::class, 'index'])->setName('contacts.index');
    $router->post('/contacts[/]', [ContactsController::class, 'store']);
};
