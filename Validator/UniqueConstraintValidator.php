<?php

namespace Giacomoto\Bundle\GiacomotoValidationBundle\Validator;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

class UniqueConstraintValidator extends ConstraintValidator
{
    public function __construct(protected EntityManagerInterface $entityManager)
    {
    }

    public function validate($value, Constraint $constraint)
    {
        if (!$constraint instanceof UniqueConstraint) {
            throw new UnexpectedTypeException($constraint, UniqueConstraint::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) to take care of that
        if (null === $value || '' === $value) {
            return;
        }

        if (!is_string($value) && !is_numeric($value)) {
            // throw this exception if your validator cannot handle the passed type so that it can be marked as invalid
            throw new UnexpectedValueException($value, 'string|int|float');

            // separate multiple types using pipes
            // throw new UnexpectedValueException($value, 'string|int');
        }

        // access your configuration options like this:
        // if ('strict' === $constraint->mode) {
        //     // ...
        // }

        if ($constraint->entity) {
            $data = $this->entityManager->getRepository($constraint->entity)->findBy([$constraint->fieldName => $value]);

            if (isset($constraint->filters["callback"])) {
                foreach ($data as $datum) {
                    if ($constraint->filters["callback"]($datum)) {
                        $this->context->buildViolation($constraint->message)
                            ->setParameter('{{ string }}', $value)
                            ->addViolation();
                        break;
                    }
                }
            } else {
                if (count($data) > 0) {
                    $this->context->buildViolation($constraint->message)
                        ->setParameter('{{ string }}', $value)
                        ->addViolation();
                }
            }
        }
    }
}
