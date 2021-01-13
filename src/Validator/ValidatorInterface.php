<?php

namespace src\Validator;

use src\Model\ModelInterface;

/**
 * Interface ValidatorInterface
 * @package src\Validator
 */
interface ValidatorInterface
{
    /**
     * @param ModelInterface $model
     * @return bool
     */
    public function validate(ModelInterface $model): bool;
}
