<?php

namespace Hito\Platform\View\Components\Form;

class DatePicker extends DateTimePicker
{
    public function render()
    {
        return view('hito::components.form.datetime-picker', [
            'dateFormat' => 'Y-m-d',
            'enableTime' => false,
            'enableCalendar' => true
        ]);
    }
}
