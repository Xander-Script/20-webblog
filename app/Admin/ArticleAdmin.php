<?php

namespace App\Admin;

use App\Admin\Fields\Base;
use App\Admin\Fields\DateTimeField;
use App\Admin\Fields\ForeignSelectField;
use App\Admin\Fields\NumberField;
use App\Admin\Fields\TextAreaField;
use App\Admin\Fields\TextField;
use App\Admin\Fields\ToggleField;
use App\Admin\Form\Builder;
use App\Admin\Form\Row;
use App\Models\Article;
use Exception;
use Illuminate\Support\Collection;
use JetBrains\PhpStorm\NoReturn;

class ArticleAdmin extends ModelAdmin {
    public Collection $schema;

    #[NoReturn] public function create_schema(): void
    {
        $this->schema = collect([
            'id'            => new NumberField('id'),
            'title'         => new TextField('title'),
            'body'          => new TextAreaField('body'),
            'description'   => new TextAreaField('body'),
            'user_id'       => new ForeignSelectField('name', name: 'user_id'),
            'published_at'  => new DateTimeField('published_at'),
            'created_at'    => new DateTimeField('created_at'),
            'updated_at'    => new DateTimeField('updated_at'),
            'premium'       => new ToggleField('premium'),
            'slug'          => new TextField('slug', disabled: true)
        ]);
    }

    public function mount(?Article $article): static
    {
        $this->model = $article;

        return $this;
    }

    public function table()
    {
        return $this->schema->only(
            'id', 'title', 'user_id', 'published_at', 'updated_at', 'premium'
        );
    }

    /**
     * @throws Exception
     */
    public function form(): Builder
    {
        $form = new Builder(
            (!is_null($this->model) ? "Update article" : "Create a new article"),
            "Please fill in all required fields"
        );

        // Article section.
        $form->mount(
            (new Row('Article'))
                ->mount($this->field('user_id'))
                ->mount($this->field('title'))
                ->mount($this->field('description'))
                ->mount($this->field('body'))
        );

        // Publication section.
        $form->mount(
            (new Row('Publication Settings'))
                ->mount($this->field('published_at'))
                ->mount($this->field('premium'))
        );

        // Metadata
        $form->mount(
            (new Row('About this Article', '', ["disabled" => true]))
                ->mount($this->field('updated_at'))
                ->mount($this->field('created_at'))
                ->mount($this->field('slug'))
        );


        return $form;
    }
}
