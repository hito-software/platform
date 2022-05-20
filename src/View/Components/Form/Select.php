<?php

namespace Hito\Platform\View\Components\Form;

use Illuminate\View\Component;

class Select extends Component
{
    public string $id;

    public function __construct(
        public string $name,
        public array $items,
        public ?string $title = null,
        public ?string $note = null,
        public ?string $placeholder = null,
        public array|string|bool|null $value = null,
        public bool $disabled = false,
        public ?bool $required = null,
        public bool $multiple = false
    ) {
        $this->id = 'form_' . $name;
    }

    public function render()
    {
        return view('hito::components.form.select');
    }
}
