<?php

namespace Hito\Platform\View\Components;

use Illuminate\View\Component;

class DeleteForm extends Component
{
    public function __construct(
        public string $noAction,
        public string $entity,
        public string $title,
        public string $description,
        public ?string $actionButton = null,
        public ?string $noActionButton = null,
        public ?string $action = null
    ) {
    }

    public function render()
    {
        return view('hito::components.delete-form');
    }
}
