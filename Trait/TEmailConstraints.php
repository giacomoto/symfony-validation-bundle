<?php

namespace Giacomoto\Bundle\GiacomotoValidationBundle\Trait;

use Giacomoto\Bundle\GiacomotoValidationBundle\Validator\UniqueEmail;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

trait TEmailConstraints
{
    /**
     * @param int $minLength
     * @param int $maxLength
     * @return array
     */
    protected function isTypeEmail(int $maxLength = 255, int $minLength = 0): array
    {
        return [
            new NotBlank(),
            new Length(['min' => $minLength, 'max' => $maxLength]),
            new Email(),
        ];
    }
}
