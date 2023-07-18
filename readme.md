# Giacomoto Validation Bundle
Giacomoto Validation Bundle uses Symfony's Validation bundle

## Install
```
composer require giacomoto/symfony-validation
```

## Usage
Create a Validator Constraints ex: ```Validation/CreateUserConstraint.php```
```php
<?php

namespace App\Validation\User;

use Giacomoto\Bundle\GiacomotoValidationBundle\Class\BaseConstraint;
use Giacomoto\Bundle\GiacomotoValidationBundle\Trait\EmailConstraintTrait;
use Giacomoto\Bundle\GiacomotoValidationBundle\Trait\PasswordConstraintTrait;
use Giacomoto\Bundle\GiacomotoValidationBundle\Trait\StringConstraintTrait;
use Symfony\Component\Validator\Constraints\Collection;

class CreateUserConstraint extends BaseConstraint
{
    use EmailConstraintTrait;
    use StringConstraintTrait;
    use PasswordConstraintTrait;

    public function getConstraints(): Collection
    {
        return new Collection([
            'email' => new Optional([
                ...$this->isTypeEmail(),
                ...$this->isUnique(User::class, 'email'),
            ]),
            'username' => [
                ...$this->isTypeString(),
                ...$this->isUnique(User::class, 'username'),
            ],
            'password' => $this->isTypePassword(),
            'lastName' => $this->isTypeString(),
            'firstName' => $this->isTypeString(),
        ]);
    }
}
```
Ex: ```Valiation/UpdateEmailContraint.php```
```php
<?php

namespace App\Validation\Auth;

use App\Entity\User;
use Giacomoto\Bundle\GiacomotoValidationBundle\Class\BaseConstraint;
use Giacomoto\Bundle\GiacomotoValidationBundle\Trait\TEmailConstraints;
use Giacomoto\Bundle\GiacomotoValidationBundle\Trait\TUniqueConstraints;
use Symfony\Component\Validator\Constraints\Collection;

class UpdateEmailConstraint extends BaseConstraint
{
    use TEmailConstraints;
    use TUniqueConstraints;

    public function getConstraints(): Collection
    {
        // access Security Bundle
        $user = $this->security->getUser();

        return new Collection([
            'email' => [
                ...$this->isTypeEmail(),
                ...$this->isUnique(User::class, 'email', [
                    // entity is the User array found all by email
                    "callback" => static fn($entity) => $entity->getId() != $user->getUserIdentifier()
                ])
            ]]);
    }
}
```
validate the Request body against the previously created validator.<br>
Ex: ```Controller/AuthController.php```
```php
<?php

namespace App\Controller;

use App\Validation\User\CreateUserConstraint;
use Giacomoto\Bundle\GiacomotoValidationBundle\Exception\ValidationException;
use Giacomoto\Bundle\GiacomotoValidationBundle\Service\ValidationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends AbstractController
{
    ...

    public function register(
        Request           $request,
        ValidationService $validationService,
    ): JsonResponse
    {
        $body = $request->toArray();

        if ($errors = $validationService->getErrors($body, CreateUserConstraint::class)) {
            // throw error
        }

        // create user
        ...
    }
}
```
Available Traits:
- TBoolConstraints
- TChoiceConstraints
- TCoordinateConstraints
- TEmailConstraints
- TIntegerConstraints
- TNumericConstraints
- TStringConstraints
- TUniqueConstraints
