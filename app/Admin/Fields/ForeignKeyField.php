<?php

namespace App\Admin\Fields;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class ForeignKeyField extends Base
{
    public function __construct(
        public string $lookup_key = 'name',
        public string $relation = '',
        public string $routeName = '',
        ...$args
    ) {
        parent::__construct(...$args);

        if (empty($relation)) {
            $this->relation = substr($this->name, 0, strrpos($this->name, '_'));
        }

        if (empty($routeName)) {
            $routeName = Str::plural($this->relation) . '.view';
        }

        $this->routeName = $routeName;
    }

    public function createRoute()
    {
        if (!empty($this->routeName) && Route::has($this->routeName)) {
            return route($this->routeName, $this->resolveForeignKey('id'));
        }

        return '';
    }

    public function resolveForeignKey($key = '')
    {
        $key = empty($key) ? $this->lookup_key : $key;

        return $this->model->{$this->relation}->{$key};


//        dd($this->value, $this->lookup_key, $this->name, $this->name);

//        return $this->value->{$this->lookup_key};
    }
}
