<?php

namespace Hito\Platform\View\Components\Form\Select;

use Hito\Platform\Models\Timezone as TimezoneModel;
use Illuminate\View\Component;

class Timezone extends Component
{
    public string $id;

    public function __construct(public string            $name,
                                public array|string|null $value = null,
                                public bool $disabled = false,
                                public ?bool             $required = null)
    {
        $this->id = 'form_' . str_replace('[]', '', $name);
    }


    public function render()
    {
        $title = 'Timezone';

        $placeholder = 'Select timezone';
        $items = TimezoneModel::all()->map(fn($timezone) => [
            'value' => $timezone->id,
            'label' => $timezone->text
        ])->toArray();

        return view('hito::components.form.select', compact('title', 'items', 'placeholder'));
    }
}
