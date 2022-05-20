<?php

namespace Hito\Platform\View\Components\Form;

class DateTimePicker extends Input
{
    public function render()
    {
        return view('hito::components.form.datetime-picker', [
            'dateFormat' => 'Y-m-d H:i',
            'enableTime' => true,
            'enableCalendar' => true
        ]);
    }
}
