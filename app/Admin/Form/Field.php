<?php

namespace App\Admin\Form;

class Field
{
    public function __construct(
        public string $name,
        public string $type,
        public string $label = '',
        public string $placeholder = '',
        public bool|null $disabled = null,
        public mixed $value = null
    )
    {
        $this->type = match ($type) {
            'boolean'               => 'checkbox',
            'foreign_key|select'    => 'select',
            default => $type
        };

//        if ($type == 'datetime') {
//            $this->type = 'datetime-local';
//        }
    }
}
