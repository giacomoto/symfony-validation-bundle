<?php

namespace Giacomoto\Bundle\GiacomotoValidationBundle\Service;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Giacomoto\Bundle\GiacomotoValidationBundle\Exception\ValidationException;

class ValidationService
{
    protected ValidatorInterface $validator;
    protected ValidationFactoryService $validationFactoryService;

    public function __construct(
        ValidatorInterface       $validator,
        ValidationFactoryService $validationFactoryService,
    )
    {
        $this->validator = $validator;
        $this->validationFactoryService = $validationFactoryService;
    }

    /**
     * @throws ValidationException
     */
    public function getErrors(array $body, string $validatorClass): ?ConstraintViolationList
    {
        $validationResult = $this->validator->validate($body, $this->validationFactoryService->getConstraints($validatorClass));

        if ($validationResult->count() > 0) {
            return $validationResult;
        }

        return null;
    }
}
