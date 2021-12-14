<?php

namespace App\Admin\Form;

use App\Admin\Form\Row;

class Builder
{
    public array $rows;

    public function __construct(public string $title, public string $description = '') { }

    public function mount(Row $row)
    {
        $this->rows[] = $row;

        return $this;
    }

//    public function newRow(string $title = '', string $description = ''): \App\Admin\Form\Row
//    {
//        return $this->rows[] = new Row($title, $description);
//    }

//    public function mountRow(Row $row)
//    {
//        return $this->rows[] = $row;
//    }

    public function render()
    {
        return view('admin.form', [
            'title' => $this->title,
            'description' => $this->description,
            'rows' => $this->rows
        ]);
//        foreach ($this->rows as $row) {
//            if (!empty($row->title)) {
//                echo $row->title;
//                echo "...<br/>";
//            }
//        }
//
//        dd($this->rows);
    }
}
