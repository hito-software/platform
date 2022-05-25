<?php

namespace Hito\Platform\Http\Requests;

use Hito\Admin\Http\Requests\StoreUserRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends StoreUserRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            ...parent::rules(),
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignoreModel(auth()->user())
            ],
        ];
    }
}
