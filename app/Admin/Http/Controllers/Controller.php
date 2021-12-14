<?php

namespace App\Admin\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\View\View;

class Controller extends \App\Http\Controllers\Controller
{
    private string $adminName;
    private object $admin;
    private object $model;

    protected string $sortBy = 'updated_at';

    /** @noinspection UnusedConstructorDependenciesInspection */
    public function __construct()
    {
        parent::__construct();

        // Will throw an exception if either there is no Admin class.
        $this->adminName = "\\App\\Admin\\{$this->modelName}Admin";
        $this->admin = new $this->adminName;
    }

    public function index(): view
    {
        $fields = $this->admin->table();

        return $this->view([
            'fields' => $fields,
            'rows' => $this->fullModel::select($fields)->latest($this->sortBy)->paginate(25)
        ]);
    }

    public function view(array $params = []): View
    {
        return view('admin.'.$this->routeName, $params);
    }
}
