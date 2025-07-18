<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class NewsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class NewsCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use DeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(News::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/news');
        CRUD::setEntityNameStrings('новость', 'Новости');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('title')->label('Заголовок');
        CRUD::column('url')->label('Полный адрес');
        CRUD::column('publish_date')->label('Дата публикации');
        CRUD::column('image_path')->label('Изображение');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        Widget::add()->type('script')->content('js/news.js');
        CRUD::setValidation(NewsRequest::class);

        CRUD::field('url')->type('url')->label('Ссылка на новость VSTU');

//        CRUD::field('title')->label('Заголовок');
//        CRUD::field('slug');
//        CRUD::field('url')->type('url')->label('Ссылка');
//        CRUD::field('publish_date')->label('Дата публикации');
//        CRUD::field('image_path')->label('Ссылка на изображение');
        News::creating(function ($entry){
            $entry->createFromUrl();
        });

        $this->crud->removeSaveAction('save_and_new');
    }
}
