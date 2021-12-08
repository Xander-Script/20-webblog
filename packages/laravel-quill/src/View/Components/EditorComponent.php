<?php

namespace Xanderificnl\LaravelQuill\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class EditorComponent extends Component
{
    public string $id;
    public string $options;

    public function __construct(string $id = '', array $options = [])
    {
        if (empty($id)) {
            $id = Str::random(10);
        }

        if (! in_array('theme', $options)) {
            $options['theme'] = 'snow';
        }

        $this->options = json_encode($options);
        $this->id = "quill_".$id;
    }

    public function render(): View
    {
        return view('quill::components.editor-component');
    }
}
