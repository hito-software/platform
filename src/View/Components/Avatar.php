<?php

namespace Hito\Platform\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Avatar extends Component
{
    protected $except = ['border'];

    public function __construct(
        public string $size,
        public ?string $image = null,
        public ?string $title = null,
        public ?string $border = null
    ) {
    }

    /**
     * @return View
     */
    public function render(): View
    {
        $symbol = null;

        $classList = $this->getClassList($this->border, !empty($this->image));

        if (!isset($this->avatar) && isset($this->title)) {
            $symbol = $this->getSymbolFromText($this->title);
        }

        return view('hito::components.avatar', compact('symbol', 'classList'));
    }

    private function getClassList(?string $borderType = null, bool $hasImage = false): string
    {
        return once(function () use ($borderType, $hasImage) {
            $allowedBorders = ['sm', 'md', 'lg'];
            $classList = [];

            if (!empty($borderType) && in_array($borderType, $allowedBorders)) {
                $classList[] = "avatar--border-{$borderType}";
            }

            $classList[] = $hasImage ? 'avatar--image' : 'avatar--text';

            return implode(' ', $classList);
        });
    }

    private function getSymbolFromText(string $text, int $max = 2): string
    {
        return once(function () use ($text, $max) {
            $words = explode(' ', $text, $max);
            $initials = [];

            foreach ($words as $word) {
                $initials[] = strtoupper(substr($word, 0, 1));
            }

            return implode('', $initials);
        });
    }
}
