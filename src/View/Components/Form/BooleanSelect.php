<?php

namespace Hito\Platform\View\Components\Form;

use Illuminate\View\Component;

class BooleanSelect extends Component
{
    public string $id;

    public function __construct(public string            $title,
                                public string            $name,
                                public ?string           $placeholder = null,
                                public array|string|null $value = null,
                                public bool              $disabled = false,
                                public ?bool             $required = null)
    {
        $this->id = 'form_' . str_replace('[]', '', $name);
    }


    public function render()
    {
        $items = [
            ['value' => '0', 'label' => 'No'],
            ['value' => '1', 'label' => 'Yes']
        ];

        return view('hito::components.form.boolean-select', compact('items'));
    }
}
