<?php

namespace Giacomoto\Bundle\GiacomotoValidationBundle\Trait;

use Symfony\Component\Validator\Constraints\Negative;
use Symfony\Component\Validator\Constraints\NegativeOrZero;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\PositiveOrZero;
use Symfony\Component\Validator\Constraints\Type;

trait TNumericConstraints
{
    /**
     * @return array
     */
    public function isTypeNumericPositive(): array
    {
        return [
            new NotBlank(),
            new Positive(),
            new Type('numeric')
        ];
    }

    /**
     * @return array
     */
    public function isTypeNumericPositiveOrZero(): array
    {
        return [
            new NotBlank(),
            new PositiveOrZero(),
            new Type('numeric')
        ];
    }

    /**
     * @return array
     */
    public function isTypeNumericNegative(): array
    {
        return [
            new NotBlank(),
            new Negative(),
            new Type('numeric')
        ];
    }

    /**
     * @return array
     */
    public function isTypeNumericNegativeOrZero(): array
    {
        return [
            new NotBlank(),
            new NegativeOrZero(),
            new Type('numeric')
        ];
    }
}
