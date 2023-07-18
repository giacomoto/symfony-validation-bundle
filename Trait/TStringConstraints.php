<?php

namespace Giacomoto\Bundle\GiacomotoValidationBundle\Trait;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

trait TStringConstraints
{
    /**
     * @param int $maxLength
     * @param int $minLength
     * @return array
     */
    protected function isTypeString(int $maxLength = 255, int $minLength = 0): array
    {
        return [
            new NotBlank(),
            new Length(['min' => $minLength, 'max' => $maxLength]),
            new Type('string'),
        ];
    }
}
