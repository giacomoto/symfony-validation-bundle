<?php

namespace Giacomoto\Bundle\GiacomotoValidationBundle\Class;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

use Giacomoto\Bundle\GiacomotoValidationBundle\Interface\IValidationConstraints;

abstract class BaseConstraint implements IValidationConstraints
{
    public function __construct(
        protected Security $security,
        protected ParameterBagInterface $parameterBag,
    )
    {
    }
}
