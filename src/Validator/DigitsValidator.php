<?php

namespace src\Validator;

use src\Exception\ValidateException;
use src\Model\DigitsModel;
use src\Model\ModelInterface;

/**
 * Class DigitsValidator
 * @package src
 */
class DigitsValidator implements ValidatorInterface
{
    /**
     * @param DigitsModel $model
     * @return bool
     */
    public function validate(ModelInterface $model): bool
    {
        $first = $model->getFirst();
        $end = $model->getEnd();

        if ($first === 0 || $end === 0) {
            throw new ValidateException('first и end должны быть числами больше 0');
        }

        if ($first > $end) {
            throw new ValidateException('first не может быть больше чем end');
        }

        return true;
    }
}
