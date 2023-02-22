<?php

namespace App\Traits;

use App\Constants\FlashMessage;

trait FlashMessages
{
    protected function setFlashMessage($message, $type)
    {
        $model = 'infoMessages';

        switch ($type) {
            case FlashMessage::INFO_MESSAGE:
                {
                    $model = 'infoMessages';
                }
                break;
            case FlashMessage::ERROR_MESSAGE:
                {
                    $model = 'errorMessages';
                }
                break;
            case FlashMessage::SUCCESS_MESSAGE:
                {
                    $model = 'successMessages';
                }
                break;
            case FlashMessage::WARNING_MESSAGE:
                {
                    $model = 'warningMessages';
                }
                break;
        }

        if (is_array($message)) {
            foreach ($message as $key => $value) {
                array_push($this->$model, $value);
            }
        } else {
            array_push($this->$model, $message);
        }
    }

    protected function getFlashMessages()
    {
        $class = __CLASS__;
        return [
            $class::ERROR_MESSAGE => $this->errorMessages,
            $class::INFO_MESSAGE => $this->infoMessages,
            $class::SUCCESS_MESSAGE => $this->successMessages,
            $class::WARNING_MESSAGE => $this->warningMessages,
        ];
    }

    protected function showFlashMessages()
    {
        $class = __CLASS__;
        session()->flash($class::ERROR_MESSAGE, $this->errorMessages);
        session()->flash($class::INFO_MESSAGE, $this->infoMessages);
        session()->flash($class::SUCCESS_MESSAGE, $this->successMessages);
        session()->flash($class::WARNING_MESSAGE, $this->warningMessages);
    }
}
