<?php

namespace App\Admin;

use App\Admin\Fields\Base;

class ModelAdmin
{
    public function __construct(
        public &$model = null
    )
    {
        $this->create_schema();
    }

    public function create_schema()
    {
//        throw new \Exception("No schema defined for ModelAdmin child.");
    }

    public function field(string $key)
    {
        if (!isset($this->schema[$key])) {
//            throw new Exception("Invalid key: $key");
        }

        $field = $this->schema[$key];

        if (is_null($this->model) || isset($field->value)) {
            return $field;
        }

        $field->value = $this->model->{$field->name};

        return $field;
    }
}

//    protected array $schema = [
//        'id'            => 'serial',
//        'title'         => 'text',
//        'body'          => 'text',
//        'user_id'       => User::class,
//        'created_at'    => 'timestamp',
//        'updated_at'    => 'timestamp',
//        'slug'          => 'string',
//        'premium'       => 'boolean',
//        'published_at'  => 'datetime',
//        'description'   => 'text'
//    ];
