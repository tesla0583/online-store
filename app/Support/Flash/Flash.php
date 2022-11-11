<?php

namespace App\Support\Flash;

use Illuminate\Contracts\Session\Session;

class Flash
{
    const MESSAGE_KEY = 'shop_flash_message';
    const MESSAGE_CLASS_KEY = 'shop_flash_class';

//    protected $session;

    public function __construct(protected Session $session)
    {
//        $this->session = $session;
    }

    public function get()
    {
        $message = $this->session->get(self::MESSAGE_KEY);

        if(!$message) {
            return null;
        }

        return new FlashMessage(
            $message,
            $this->session->get(self::MESSAGE_CLASS_KEY, '')
        );
    }

    public function info($message)
    {
        $this->flash($message, 'info');
    }

    public function alert($message)
    {
        $this->flash($message, 'alert');
    }

    private function flash($message, $name)
    {
//        dd(config("flash.$name"));
        $this->session->flash(self::MESSAGE_KEY, $message);
        $this->session->flash(self::MESSAGE_CLASS_KEY, config("flash.$name", ''));
    }
}