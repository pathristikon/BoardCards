<?php

namespace App\Utils\Interfaces;

/**
 * Interface RequiredInputInterface
 *
 * Holds the required fields for out newly
 * created objects.
 *
 * @package App\Utils\Interfaces
 */
interface RequiredInputInterface
{
    const required_type = 'type';
    const required_departure = 'departure';
    const required_arrival = 'arrival';
    const required_sit = 'sit';
}
