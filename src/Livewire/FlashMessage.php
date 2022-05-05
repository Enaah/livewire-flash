<?php

namespace MattLibera\LivewireFlash\Livewire;

use Livewire\Component;

class FlashMessage extends Component
{
    public $message;
    public $styles = [];
    public $iconset;

    public $shown = true;

    public function mount($message)
    {
        if (!is_array($message)) {
            $message = (array) $message;
        }
        $this->message = $message;
        $this->styles = config('livewire-flash.styles.' . $this->message['level']);
        $this->iconset = config('livewire-flash.iconset');
    }

    public function render()
    {
        return view(config('livewire-flash.views.message'));
    }

    public function dismiss()
    {
        $this->shown = false;
    }
}
