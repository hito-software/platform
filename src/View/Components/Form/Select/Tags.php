<?php

namespace Hito\Platform\View\Components\Form\Select;

use App\Models\Tag;
use Illuminate\View\Component;

class Tags extends Component
{
    public string $id;

    public function __construct(
        public string $name,
        public array|string|null $value = null,
        public ?bool $required = null,
        public bool $disabled = false,
        public bool $multiple = true
    ) {
        $this->id = 'form_' . $name;
        $this->value = json_decode($value);
    }

    protected function getTitle(): string
    {
        return trans_choice('app.entities.tags', $this->multiple ? 2 : 1);
    }

    protected function getType(): ?string
    {
        return null;
    }

    private function getItems(): array
    {
        $type = $this->getType();

        $list = is_null($type) ? Tag::whereNull('type')->get() : Tag::whereType($type)->get();

        return $list->map(fn ($tag) => [
            'value' => $tag->name,
            'label' => $tag->name
        ])->toArray();
    }

    protected function getPlaceholder(): string
    {
        return __('app.select-tags');
    }

    public function render()
    {
        $title = $this->getTitle();
        $placeholder = $this->getPlaceholder();
        $items = $this->getItems();

        return view('hito::components.form.select-wrapper', compact('title', 'items', 'placeholder'));
    }
}
