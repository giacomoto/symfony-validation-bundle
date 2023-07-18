<?php

namespace Giacomoto\Bundle\GiacomotoValidationBundle\Trait;

use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Type;

trait TBoolConstraints
{
    /**
     * @return array
     */
    public function isTypeBool(): array
    {
        return [
            new NotNull(),
            new Type('bool'),
            new Choice([true, false]),
        ];
    }
}
