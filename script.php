<?php

use src\Exception\ValidateException;
use src\Model\DigitsModel;
use src\Model\TicketModel;
use src\Service\TicketService;
use src\Validator\DigitsValidator;

/**
 * @return int
 */
function findLuckyNumbers(): int
{
    try {
        if (!isset($_GET['first']) || !isset($_GET['end'])) {
            throw new ValidateException('first и end обязательные параметры');
        }

        $digitsModel = new DigitsModel((int)$_GET['first'], (int)$_GET['end']);
        (new DigitsValidator())->validate($digitsModel);

        $counter = 0;
        for ($i = $digitsModel->getFirst(); $i <= $digitsModel->getEnd(); $i++) {
            if ((new TicketService(new TicketModel($i)))->isLuckyTicket()) {
                if ($_GET['show']) echo "{$i} \n";
                $counter++;
            }
        }

        return $counter;
    } catch (ValidateException $exception) {
        echo "Ошибка валидации!\n";
        echo $exception->getMessage();
        die();
    } catch (Exception $exception) {
        echo "Произошла ошибка!\n";
        echo $exception->getMessage();
        die();
    }
}
