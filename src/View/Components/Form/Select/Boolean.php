<?php

namespace Hito\Platform\View\Components\Form\Select;

use Illuminate\View\Component;
use function view;

class Boolean extends Component
{
    public string $id;

    public function __construct(
        public string $title,
        public string $name,
        public ?string $placeholder = null,
        public array|string|bool|null $value = null,
        public ?bool $required = null,
        public bool $disabled = false
    ) {
        $this->id = 'form_' . str_replace('[]', '', $name);
    }

    public function render()
    {
        $items = [
            ['value' => 0, 'label' => __('app.no')],
            ['value' => 1, 'label' => __('app.yes')]
        ];

        return view('hito::components.form.boolean-select', compact('items'));
    }
}
