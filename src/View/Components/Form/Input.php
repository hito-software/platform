<?php

namespace Hito\Platform\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public string $id;

    public function __construct(
        public string $name,
        public ?string $note = null,
        public ?string $title = null,
        public ?string $placeholder = null,
        public ?string $value = null,
        public ?bool $required = null,
        public ?bool $clear = false,
        public ?bool $disabled = false
    ) {
        $this->id = 'form_' . $name;
    }

    public function render()
    {
        return view('hito::components.form.input');
    }
}
