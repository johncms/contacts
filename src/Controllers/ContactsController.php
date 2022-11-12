<?php

declare(strict_types=1);

namespace Johncms\Contacts\Controllers;

use Johncms\Controller\BaseController;
use Johncms\Contacts\Forms\FeedbackForm;
use Johncms\Exceptions\ValidationException;
use Johncms\Http\Response\RedirectResponse;
use Johncms\Http\Session;

class ContactsController extends BaseController
{
    protected string $moduleName = 'johncms/contacts';

    public function __construct()
    {
        parent::__construct();
        $this->metaTagManager->setAll(__('Contacts'));
        $this->navChain->add(__('Contacts'), route('contacts.index'));
    }

    public function index(): string
    {
        $feedbackForm = new FeedbackForm();

        $data = [
            'formFields'       => $feedbackForm->getFormFields(),
            'validationErrors' => $feedbackForm->getValidationErrors(),
            'storeUrl'         => route('contacts.index'),
        ];
        return $this->render->render('contacts::index', ['data' => $data]);
    }

    public function store(Session $session): string | RedirectResponse
    {
        $feedbackForm = new FeedbackForm();
        try {
            // Validate the form
            $feedbackForm->validate();
            $session->flash('success', __('Your message has been sent successfully'));

            $values = $feedbackForm->getRequestValues();
            // TODO: Add send message

            return (new RedirectResponse(route('contacts.index')));
        } catch (ValidationException $validationException) {
            // Redirect to the registration form if the form is invalid
            return (new RedirectResponse(route('contacts.index')))
                ->withPost()
                ->withValidationErrors($validationException->getErrors());
        }
    }

}
