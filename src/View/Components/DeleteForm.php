<?php

namespace Hito\Platform\View\Components;

use Illuminate\View\Component;

class DeleteForm extends Component
{
    public function __construct(
        public string  $title,
        public ?string  $description = null,
        public ?string $cancelUrl = null,
        public ?string $submitButton = null,
        public ?string $cancelButton = null,
        public ?string $destroyUrl = null
    ) {
    }

    public function render()
    {
        return view('hito::components.delete-form');
    }
}
