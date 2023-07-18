<?php

namespace Giacomoto\Bundle\GiacomotoValidationBundle\Interface;

use Symfony\Component\Validator\Constraints\Collection;

interface IValidationConstraints
{
    public function getConstraints(): Collection;
}
