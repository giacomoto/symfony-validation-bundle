<?php

namespace Giacomoto\Bundle\GiacomotoValidationBundle\Validator;

use PhpParser\Node\Expr\Closure;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class UniqueConstraint extends Constraint
{
    public string $entity;
    public string $fieldName;
    public array $filters;

    public function __construct(string $entity, string $fieldName, array $filters, mixed $options = null, array $groups = null, mixed $payload = null)
    {
        $options["entity"] = $entity;
        $options["fieldName"] = $fieldName;
        $options["filters"] = $filters;

        parent::__construct($options, $groups, $payload);
    }

    public string $message = 'The value "{{ string }}" is already taken.';
    public string $mode = 'strict'; // If the constraint has configuration options, define them as public properties
}
