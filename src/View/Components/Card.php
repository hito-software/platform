<?php

namespace Hito\Platform\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public function __construct(
        public ?string $banner = null,
        public ?string $title = null,
        public ?string $subtitle = null
    ) {
    }

    public function render()
    {
        return view('hito::components.card');
    }
}
