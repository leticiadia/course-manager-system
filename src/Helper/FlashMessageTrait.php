<?php

namespace MVC\Courses\Helper;

trait FlashMessageTrait 
{
    public function defineMessage(string $type, string $message): void
    {
        $_SESSION['type_message'] = $type;
        $_SESSION['message'] = $message;
    }
}