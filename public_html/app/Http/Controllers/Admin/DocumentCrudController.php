<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class DocumentCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class DocumentCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(Document::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/document');
        CRUD::setEntityNameStrings('Документ', 'Документы');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('category_id')->label('Категория');
        CRUD::column('name')->label('Название');
        CRUD::column('filename')->label('Имя файла');
        CRUD::column('is_published')->label('Опубликовано')->type('boolean');
        CRUD::column('created_at')->label('Дата создания');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(DocumentRequest::class);

        CRUD::field('category_id')->label('Категория');
        CRUD::field('name')->label('Название');
        CRUD::field('is_published')->label('Опубликовано')->default(true);

        CRUD::addField([
                'name' => 'filename',
                'label' => 'Файл',
                'type' => 'upload',
                'upload' => true,
                'disk' => 'public']
        );
//        Document::creating(function ($entry) {
//            $entry->filename = basename($entry->filename);
//            dd($entry->filename);
//            $entry->save();
//        });


        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }
}
