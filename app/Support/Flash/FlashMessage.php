<?php
/**
 * Created by PhpStorm.
 * User: ladmin
 * Date: 05.11.2022
 * Time: 23:42
 */

namespace App\Support\Flash;


class FlashMessage
{
    public function __construct(protected $message, protected $class)
    {
    }

    public function message()
    {
        return $this->message;
    }

    public function class()
    {
        return $this->class;
    }
}