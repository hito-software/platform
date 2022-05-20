<?php

namespace Hito\Platform\View\Components\Form;

use App\Enums\FileType;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Media extends Component
{
    public string $id;

    public function __construct(
        public string $name,
        public ?string $note = null,
        public ?string $title = null,
        public Collection|string|null $value = null,
        public ?bool $required = null,
        public ?int $max = null,
        public bool $disabled = false,
        public FileType|string|array $type = FileType::ALL
    ) {
        if (is_string($this->value)) {
            $this->value = collect($this->value); // @phpstan-ignore-line
        }

        if (!is_array($type)) {
            $type = [$type];
        }

        foreach ($type as $t) {
            if (is_string($t)) {
                FileType::from($t);
            }
        }

        $this->id = 'form_' . $name;
    }

    public function render()
    {
        return view('hito::components.form.media');
    }
}
