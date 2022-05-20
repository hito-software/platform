<?php

namespace Hito\Platform\View\Components\Form\Select;

use Illuminate\View\Component;
use function view;

class Language extends Component
{
    public string $id;

    public function __construct(
        public string $title,
        public string $name,
        public ?string $placeholder = null,
        public string|null $value = null,
        public ?bool $required = null,
        public bool $disabled = false
    ) {
        $this->id = 'form_' . str_replace('[]', '', $name);
    }

    public function render()
    {
        $items = [];

        foreach (config('app.available_locales') as $value => $label) {
            $items[] = compact('value', 'label');
        }

        $this->placeholder = 'Select language';

        return view('hito::components.form.select', compact('items'));
    }
}
