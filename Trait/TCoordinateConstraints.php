<?php

namespace Giacomoto\Bundle\GiacomotoValidationBundle\Trait;

use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

trait TCoordinateConstraints
{
    /**
     * @return array
     */
    public function isTypeLatitude(): array {
        return [
            new NotBlank(),
            new Type('numeric'),
            new LessThanOrEqual(90),
            new GreaterThanOrEqual(-90),
        ];
    }

    /**
     * @return array
     */
    public function isTypeLongitude(): array {
        return [
            new NotBlank(),
            new Type('numeric'),
            new LessThanOrEqual(180),
            new GreaterThanOrEqual(-180),
        ];
    }
}
