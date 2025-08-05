<?php

namespace App\Traits;

trait AlertMessage
{
    public function alert($type, $message)
    {
        $this->js(<<<JS
            window.dispatchEvent(new CustomEvent('alert', {
                detail: {
                    type: '$type',
                    message: '$message'
                }
            }))
        JS);
    }
}
