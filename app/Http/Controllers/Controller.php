<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public string $model = '';

    public function __construct()
    {
        if (! empty($this->model)) {
            $this->authorizeResource('\App\Models\\'.ucfirst($this->model), strtolower($this->model));
        }
    }
}
