<?php

namespace App\Admin\Form;

class Row
{
    public array $fields = [];

    public function __construct(
        public string $title = '',
        public string $description = '',
        public array $field_options = ['disabled' => false]
    ) {
        return $this;
    }


    public function mount(Field $field)
    {
        if (is_null($field->disabled)) {
            $field->disabled = $this->field_options['disabled'];
        }

//        dd($field);

        $this->fields[] = $field;

        return $this;
    }
}
