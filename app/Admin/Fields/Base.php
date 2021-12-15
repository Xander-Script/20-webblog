<?php

namespace App\Admin\Fields;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

abstract class Base extends Component
{
    private string $componentType = '';
    public string $route = '';

    public function __construct(
        public string $name,
        public mixed  $value = null,
        public string $label = '',
        public string $view_path = '',
        public bool   $disabled = false,
        public array  $options = [],
        public mixed  $model = null
    )
    {
        if (empty($label)) {
            $this->label = \Str::headline($name);
        }
    }

    public function render(): view
    {
//        if (is_null($this->value)) {
            $this->value = $this->model->{$this->name};
//        }

        if (empty($view_path)) {
            $this->view_path = "admin.components";
        }

        $this->view_path .= ".{$this->componentType}.";

        $type = Str::snake(class_basename(static::class));

        if ($this->componentType == 'table') {
            $prefix = strstr($type, '_', true);

            if ($prefix == 'foreign' && isset($this->lookup_key) && isset($this->relation)) {
//                $this->value = $row->{$this->relation}->{$this->lookup_key};
                $this->value = $this->resolveForeignKey();
                $this->route = $this->createRoute();
            }

            $type = match ($type) {
                'number_field' => 'text_field',
                'foreign_select_field' => 'foreign_text_field',
                default => $type
            };
        }


        $this->view_path .= $type;

        return view($this->view_path, $this->extractPublicProperties());
    }

    public function table($row): static
    {
        $this->model = $row;
        $this->componentType = 'table';

        return $this;
    }

    public function form($row): static
    {
        $this->model = $row;
        $this->componentType = 'form';

        return $this;
    }

    // abstract
    public function resolveForeignKey($key = '') { return ''; }
    public function createRoute() { return ''; }
}
