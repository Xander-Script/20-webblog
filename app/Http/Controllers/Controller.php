<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Pluralizer;
use Illuminate\View\View;
use function Psy\debug;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public string $routeName = '';
    public string $modelName = '';

    public function __construct()
    {
        // This is null when we're in CLI mode, i.e. when running `./artisan route:list`
        $route = request()->route();

        if (is_null($route)) {
            return; // When in CLI.
        }

        $routeName = $route->getName();
        $modelName = $this->modelName;

        if (strlen($modelName) == 0) {
            $modelName = strstr($routeName, '.', true);
            $modelName = Pluralizer::singular($modelName);
        }

        $this->authorizeResource("\App\Models\\".ucfirst($modelName), $modelName);
        $this->routeName = $routeName;
        $this->modelName = $modelName;
    }

    public function view(array $params = []): View
    {
        return view($this->routeName, $params);
    }
}
