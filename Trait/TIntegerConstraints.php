<?php

namespace Giacomoto\Bundle\GiacomotoValidationBundle\Trait;

use Symfony\Component\Validator\Constraints\Negative;
use Symfony\Component\Validator\Constraints\NegativeOrZero;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\PositiveOrZero;
use Symfony\Component\Validator\Constraints\Type;

trait TIntegerConstraints
{
    /**
     * @return array
     */
    public function isTypeIntegerPositive(): array
    {
        return [
            new NotBlank(),
            new Positive(),
            new Type('integer')
        ];
    }

    /**
     * @return array
     */
    public function isTypeIntegerPositiveOrZero(): array
    {
        return [
            new NotBlank(),
            new PositiveOrZero(),
            new Type('integer')
        ];
    }

    /**
     * @return array
     */
    public function isTypeIntegerNegative(): array
    {
        return [
            new NotBlank(),
            new Negative(),
            new Type('integer')
        ];
    }

    /**
     * @return array
     */
    public function isTypeIntegerNegativeOrZero(): array
    {
        return [
            new NotBlank(),
            new NegativeOrZero(),
            new Type('integer')
        ];
    }
}
