<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DirectionRequest;
use App\Models\Direction;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanel;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Class DirectionCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class DirectionCrudController extends CrudController
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
        CRUD::setModel(Direction::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/direction');
        CRUD::setEntityNameStrings('направление', 'Направления');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        Widget::add()->type('script')->content('storage/basset/vendor/backpack/crud/src/resources/assets/js/directions.js');

        CRUD::column('name')->label('Название направление');
        CRUD::column('program')->label('Программа');
        CRUD::column('short_name')->label('Сокращенное название');
        CRUD::column('qualification')->label('Квалификация');
        CRUD::column('target_audience')->label('Для кого');
        CRUD::column('for_it')->label('Для IT')->type('boolean');
        CRUD::column('created_at')->label('Дата создания');
        CRUD::column('is_published')->label('Опубликовано')->type('boolean');
        CRUD::orderBy('order');

        $this->crud->removeButton('view');
        $this->crud->addButtonFromView('line', 'publish', 'publish-direction-button', 'end');
        $this->crud->addButtonFromView('line', 'moveUp', 'move-up-direction-button', 'end');
        $this->crud->addButtonFromView('line', 'moveDown', 'move-down-direction-button', 'end');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(DirectionRequest::class);

        CRUD::field('name')->label('Название');
        CRUD::field('short_name')->label('Сокращенное название');
        CRUD::field('for_it')->label('Для IT');
        CRUD::field('program')->label('Программа');
        CRUD::field('qualification')->label('Квалификация');
        CRUD::field('target_audience')->label('Для кого');

        Direction::creating(function ($entry) {
            $lastOrder = Direction::getLastOrderNumber();
            $entry->order = $lastOrder ? $lastOrder + 1 : 1;
        });

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
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

    protected function setupMoveRoutes($segment, $routeName, $controller)
    {
        Route::get($segment . '/{id}/move', [
            'as' => $routeName . '.move',
            'uses' => $controller . '@move',
            'operation' => 'move',
        ]);
    }

    public function move(Request $request, Direction $direction)
    {
        $type = $request->query('type');
        if (Direction::checkMoveType($type)) {
            return (int)$direction->move($type);
        }
        return '0';
    }

    protected function setupPublishRoutes($segment, $routeName, $controller)
    {
        Route::get($segment . '/{id}/publish', [
            'as' => $routeName . '.publish',
            'uses' => $controller . '@publish',
            'operation' => 'publish',
        ]);
    }

    public function publish(Direction $direction)
    {
        return (int)$direction->publish();
    }
}
