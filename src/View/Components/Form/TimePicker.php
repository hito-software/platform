<?php

namespace Hito\Platform\View\Components\Form;

class TimePicker extends DateTimePicker
{
    public function render()
    {
        return view('hito::components.form.datetime-picker', [
            'dateFormat' => 'H:i',
            'enableTime' => true,
            'enableCalendar' => false
        ]);
    }
}
