<?php

namespace Hito\Platform\View\Components\Form\Select;

use App\Models\Role;
use Illuminate\View\Component;

class Roles extends Component
{
    public string $id;

    public function __construct(
        public string $name,
        public string $type,
        public array|string|null $value = null,
        public ?bool $required = null,
        public bool $disabled = false,
        public bool $multiple = true
    ) {
        $this->id = 'form_' . $name;
    }

    private function getItems(): array
    {
        $list = Role::where('guard_name', $this->type)->get();

        return $list->map(fn ($role) => [
            'value' => $role->id,
            'label' => $role->name
        ])->toArray();
    }

    public function render()
    {
        $title = trans_choice('app.entities.roles', $this->multiple ? 2 : 1);
        $placeholder = $this->multiple ?
            trans_choice('app.select-roles', 2) : trans_choice('app.select-roles', 1);
        $items = $this->getItems();

        return view('hito::components.form.select-wrapper', compact('title', 'items', 'placeholder'));
    }
}
