<?php

namespace Hito\Platform\View\Components\Form\Select;

use App\Models\User;
use Illuminate\View\Component;

class Users extends Component
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
        $list = User::where('is_admin', $this->type === 'admin')->get();

        return $list->map(fn ($user) => [
            'value' => $user->id,
            'label' => "{$user->full_name} ({$user->email})"
        ])->toArray();
    }

    public function render()
    {
        $title = trans_choice('app.entities.users', 2);
        $placeholder = trans_choice('app.select-users', 2);
        $items = $this->getItems();

        return view('hito::components.form.select-wrapper', compact('title', 'items', 'placeholder'));
    }
}
