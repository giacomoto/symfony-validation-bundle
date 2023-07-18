<?php

namespace Giacomoto\Bundle\GiacomotoValidationBundle\Trait;

use Giacomoto\Bundle\GiacomotoValidationBundle\Validator\UniqueConstraint;

trait TUniqueConstraints
{
    /**
     * @param string $entity
     * @param string $fieldName
     * @param array $filters
     * @return array
     */
    protected function isUnique(string $entity, string $fieldName, array $filters = []): array
    {
        return [
            new UniqueConstraint($entity, $fieldName, $filters)
        ];
    }
}
