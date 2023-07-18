<?php

namespace Giacomoto\Bundle\GiacomotoValidationBundle\Trait;

use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Component\Validator\Constraints\NotBlank;

trait TChoiceConstraints
{
    /**
     * @param array $choices
     * @return array
     */
    public function isTypeChoice(array $choices): array
    {
        return [
            new NotBlank(),
            new Choice($choices),
        ];
    }
}
