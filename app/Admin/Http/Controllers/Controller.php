<?php

namespace App\Admin\Http\Controllers;

use Illuminate\View\View;

class Controller extends \App\Http\Controllers\Controller
{
    public function view(array $params = []): View
    {
        return view('admin.'.$this->routeName, $params);
    }
}
