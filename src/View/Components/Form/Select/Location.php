<?php

namespace Hito\Platform\View\Components\Form\Select;

use Hito\Platform\Services\LocationService;
use Illuminate\View\Component;

class Location extends Component
{
    public string $id;

    public function __construct(public string            $name,
                                public bool              $showTitle = true,
                                public array|string|null $value = null,
                                public bool              $disabled = false,
                                public bool              $multiple = false,
                                public ?bool             $required = null)
    {
        $this->id = 'form_' . str_replace('[]', '', $name);
    }


    public function render()
    {
        if ($this->showTitle) {
            $title = $this->multiple ? 'Locations' : 'Location';
        } else {
            $title = null;
        }

        $note = !$this->required && $this->multiple ? 'If empty, all locations are selected' : null;

        $placeholder = 'Select location';
        $items = app(LocationService::class)->getAll()->map(fn($location) => [
            'value' => $location->id,
            'label' => $location->name
        ])->toArray();

        return view('hito::components.form.select-location', compact('title', 'note', 'items', 'placeholder'));
    }
}
