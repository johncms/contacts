<?php

declare(strict_types=1);

namespace Johncms\Contacts\Forms;

use Johncms\Forms\AbstractForm;
use Johncms\Forms\Inputs\InputText;
use Johncms\Forms\Inputs\Textarea;
use Laminas\Validator\Hostname;

class FeedbackForm extends AbstractForm
{
    protected function prepareFormFields(): array
    {
        $fields = [];
        $fields['name'] = (new InputText())
            ->setLabel(__('Name'))
            ->setPlaceholder(__('Enter your name'))
            ->setNameAndId('name')
            ->setValue($this->getValue('name'))
            ->setValidationRules(
                [
                    'NotEmpty',
                    'StringLength' => ['min' => 3, 'max' => 200],
                ]
            );

        $fields['phone'] = (new InputText())
            ->setLabel(__('Phone'))
            ->setPlaceholder(__('Enter your phone'))
            ->setNameAndId('phone')
            ->setValue($this->getValue('phone'));

        $fields['email'] = (new InputText())
            ->setLabel(__('E-mail'))
            ->setPlaceholder(__('Enter your e-mail'))
            ->setNameAndId('email')
            ->setValue($this->getValue('email'))
            ->setValidationRules(
                [
                    'NotEmpty',
                    'EmailAddress' => [
                        'allow'          => Hostname::ALLOW_DNS,
                        'useMxCheck'     => true,
                        'useDeepMxCheck' => true,
                    ],
                ]
            );

        $fields['message'] = (new Textarea())
            ->setLabel(__('Message'))
            ->setPlaceholder(__('Enter a message'))
            ->setNameAndId('message')
            ->setValue($this->getValue('message'))
            ->setValidationRules(['NotEmpty']);

        return $fields;
    }
}
