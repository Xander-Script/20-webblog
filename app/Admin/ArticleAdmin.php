<?php

namespace App\Admin;

use App\Admin\Form\Builder;
use App\Admin\Form\Field;
use App\Admin\Form\Row;
use App\Models\Article;
use Exception;
use Illuminate\Support\Carbon;

class ArticleAdmin extends ModelAdmin {
    public array $schema = [];
    public ?Article $model = null;

    public function create_schema()
    {
        $this->schema = [
            'id'            => new Field('id', 'integer', '', '', true),
            'title'         => new Field('title', 'text'),
            'body'          => new Field('body', 'textarea'),
            'description'   => new Field('description', 'textarea', 'Summary'),
            'user_id'       => new Field('user_id', 'foreign_key|select', 'Author'),
            'published_at'  => new Field('published_at', 'datetime', 'Publication date'),
            'premium'       => new Field('premium', 'boolean', 'Article is for premium users only'),
            'updated_at'    => new Field('updated_at', 'datetime', 'Last modified'),
            'created_at'    => new Field('created_at', 'datetime', 'Created at'),
            'slug'          => new Field('slug', 'text', 'Slug')
        ];
    }

    public function mount(?Article $article)
    {
        $this->model = $article;

        return $this;
    }

    protected array $table = [
        'id', 'title', 'user_id', 'published_at', 'updated_at', 'premium'
    ];

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
