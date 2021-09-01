<?php

/**
 * This file is part of JohnCMS Content Management System.
 *
 * @copyright JohnCMS Community
 * @license   https://opensource.org/licenses/GPL-3.0 GPL-3.0
 * @link      https://johncms.com JohnCMS Project
 */

declare(strict_types=1);

namespace Johncms\Contacts\Controllers;

use Johncms\Controller\BaseController;

class ContactsController extends BaseController
{
    protected string $module_name = 'contacts';

    public function __construct()
    {
        parent::__construct();
        $this->metaTagManager->setAll(__('Contacts'));
        $this->nav_chain->add(__('Contacts'), route('contacts.index'));
    }

    public function index(): string
    {
        return 'Example response';
    }
}
