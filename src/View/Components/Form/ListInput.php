<?php

namespace Hito\Platform\View\Components\Form;

use Illuminate\Support\Collection;
use Illuminate\View\Component;

class ListInput extends Component
{
    public string $id;

    public function __construct(
        public string $name,
        public ?string $title = null,
        public ?string $note = null,
        public Collection|array|null $value = null,
        public bool $required = false,
        public ?bool $disabled = null,
        public ?int $max = null
    ) {
        $this->id = 'form_' . str_replace('[]', '', $name);

        if ($value instanceof Collection) {
            $this->value = $value->toArray();
        }
    }

    public function render()
    {
        return view('hito::components.form.list-input');
    }
}
