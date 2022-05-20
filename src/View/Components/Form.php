<?php

namespace Hito\Platform\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    protected $except = ['method'];

    public function __construct(
        public string $action,
        public string $method,
        public ?string $id = null
    ) {
    }

    public function render()
    {
        $requestMethod = $this->method;

        if (!in_array(strtoupper($this->method), ['GET', 'POST'])) {
            $formMethod = 'post';
        } else {
            $formMethod = $this->method;
        }

        return view('hito::components.form', compact('requestMethod', 'formMethod'));
    }
}
