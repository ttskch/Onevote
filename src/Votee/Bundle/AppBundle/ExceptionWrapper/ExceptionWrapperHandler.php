<?php

namespace Votee\Bundle\AppBundle\ExceptionWrapper;

use FOS\RestBundle\View\ExceptionWrapperHandlerInterface;

class ExceptionWrapperHandler implements ExceptionWrapperHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function wrap($data)
    {
        $errors = [];

        /** @var \Symfony\Component\Form\FormInterface $form */
        $form = $data['errors'];

        foreach ($form->all() as $child) {
            if (!$child->isValid()) {
                // return the top one of errors.
                $errors[$child->getName()] = $child->getErrors()->current();
            }
        }

        return $errors;
    }
}
