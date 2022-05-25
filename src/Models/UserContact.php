<?php

namespace Hito\Platform\Models;

use Hito\Admin\Enums\ContactType;
use Hito\Core\Database\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    use Uuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'value',
        'user_id'
    ];

    protected $casts = [
        'type' => ContactType::class
    ];
}
