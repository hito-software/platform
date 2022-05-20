<?php

namespace Hito\Platform\View\Components;

use Hito\Platform\Models\User;
use Illuminate\View\Component;

class UserAvatar extends Component
{
    public function __construct(
        public string $size,
        public User $user,
        public ?string $border = null
    ) {
    }

    public function render()
    {
        $image = $this->user->avatar;

        if (empty($image)) {
            $image = null;
        }

        $title = $this->user->full_name;

        return view('hito::components.user-avatar', compact('title', 'image'));
    }
}
