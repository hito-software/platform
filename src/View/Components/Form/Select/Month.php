<?php

namespace Hito\Platform\View\Components\Form\Select;

use Illuminate\View\Component;

class Month extends Component
{
    public string $id;

    public function __construct(
        public string $name,
        public \App\Enums\Month|int|null $value = null,
        public ?bool $required = null,
        public bool $disabled = false
    ) {
        $this->id = 'form_' . str_replace('[]', '', $name);

        if ($value instanceof \App\Enums\Month) {
            $this->value = $value->value;
        }
    }

    public function render()
    {
        $title = __('app.month');

        $placeholder = __('app.select-month');

        $items = collect(\App\Enums\Month::cases())->map(fn ($month) => [
            'value' => $month->value,
            'label' => $month->name()
        ])->toArray();

        return view('hito::components.form.select', compact('title', 'items', 'placeholder'));
    }
}
