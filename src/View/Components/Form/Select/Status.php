<?php

namespace Hito\Platform\View\Components\Form\Select;

use Illuminate\View\Component;

class Status extends Component
{
    public string $id;

    public function __construct(
        public string $name,
        public \Hito\Admin\Enums\Status|string|null $value = null,
        public ?bool $required = null,
        public bool $disabled = false
    ) {
        $this->id = 'form_' . str_replace('[]', '', $name);

        if ($value instanceof \Hito\Admin\Enums\Status) {
            $this->value = $value->value;
        }
    }

    public function render()
    {
        $title = __('app.status');

        $placeholder = __('app.select-status');

        $items = collect(\Hito\Admin\Enums\Status::cases())->map(fn ($status) => [
            'value' => $status->value,
            'label' => $status->toString()
        ])->toArray();

        return view('hito::components.form.select', compact('title', 'items', 'placeholder'));
    }
}
