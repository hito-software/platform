<?php

namespace Hito\Platform\View\Components\Form\Select;

use App\Models\Permission;
use Illuminate\View\Component;

class Permissions extends Component
{
    public string $id;

    public function __construct(
        public string $name,
        public string $type,
        public array|null $value = null,
        public ?bool $required = null,
        public bool $disabled = false,
        public bool $multiple = true
    ) {
        $this->id = 'form_' . $name;
    }

    private function getItems(): array
    {
        $list = Permission::where('guard_name', $this->type)->get();

        return $list->map(fn ($permission) => [
            'value' => $permission->id,
            'label' => $permission->name
        ])->toArray();
    }

    public function render()
    {
        $title = __('app.permissions');
        $placeholder = __('app.select-permissions');
        $items = $this->getItems();

        return view('hito::components.form.select-wrapper', compact('title', 'items', 'placeholder'));
    }
}
