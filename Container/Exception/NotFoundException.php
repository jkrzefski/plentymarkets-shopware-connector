<?php

namespace PlentyConnector\Container\Exception;

use Exception;
use Interop\Container\Exception\NotFoundException as BaseException;

/**
 * Class NotFoundException.
 */
class NotFoundException extends Exception implements BaseException
{
}