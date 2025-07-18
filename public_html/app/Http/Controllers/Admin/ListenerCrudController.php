<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ListenersExport;
use App\Exports\ListnersExportDuplicate;
use App\Exports\ListnersExportIno;
use App\Exports\ListnersExportInoCount;
use App\Http\Requests\ListenerRequest;
use App\Models\Listener;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Maatwebsite\Excel\Facades\Excel;

/**
 * Class ListenerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ListenerCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;


    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Listener::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/listener');
        CRUD::setEntityNameStrings('Слушатель', 'Слушатели');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id')->label('ID');
        CRUD::column('fio')->label('ФИО');
        CRUD::column('email')->label('email');
        CRUD::column('vk')->label('VK');
        CRUD::column('phone')->label('Телефон');
        CRUD::column('documents_number')->label('Документ');
        CRUD::column('is_foreign')->label('Иностранный гражданин')->type('boolean');
        CRUD::column('direction_id')->label('Направление');
        CRUD::column('university')->label('Учебное заведение');
        CRUD::column('faculty')->label('Факультет');
        CRUD::column('group_name')->label('Группа');
        CRUD::column('education_level')->label('Уровень образования');
        CRUD::column('specialization')->label('Направление обучения');
        CRUD::addColumn([
            'name' => 'image',
            'type' => 'text',
            'label' => 'Изображение',
            'wrapper' => [
                'href' => function ($crud, $column, $entry, $related_key) {
                    return $entry->getImage();
                },
            ],
        ]);
        CRUD::column('created_at')->label('Дата создания');


        $this->crud->button(
            [
                'name' => 'export',
                'position' => 'end',
            ])->stack('bottom')->view('crud::buttons.export-button');
        $this->crud->button(
            [
                'name' => 'export_ino',
                'position' => 'end',
            ])->stack('bottom')->view('crud::buttons.export-ino-button');
        $this->crud->button(
            [
                'name' => 'export_ino_count',
                'position' => 'end',
            ])->stack('bottom')->view('crud::buttons.export-ino-count-button');
        $this->crud->button(
            [
                'name' => 'export_duplicate_error',
                'position' => 'end',
            ])->stack('bottom')->view('crud::buttons.export-duplicate-error-button');
    }

    protected function setupUpdateOperation()
    {
        CRUD::setValidation(ListenerRequest::class);
        CRUD::field('fio')->label('ФИО');
        CRUD::field('birthday')->label('День рождение');
        CRUD::field('email')->label('email');
        CRUD::field('vk')->label('VK');
        CRUD::field('phone')->label('Телефон');
        CRUD::field('documents_number')->label('Документ');
        CRUD::field('is_foreign')->label('Иностранный гражданин')->type('boolean');
        CRUD::field('country')->label('Гражданство');
        CRUD::field('direction_id')->label('Направление');
        CRUD::field('university')->label('Учебное заведение');
        CRUD::field('faculty')->label('Факультет');
        CRUD::field('group_name')->label('Группа');
        CRUD::field('time_edu')->label('Форма обучения');
        CRUD::field('start_year')->label('Год начала обучения');
        CRUD::field('diplom_num')->label('Номер диплома о предыдущем образовании');
        CRUD::field('diplom_place')->label('Место получения предыдущего образования');
        CRUD::field('diplom_napr')->label('Направление обучения предыдущего образования');
        CRUD::field('diplom_year')->label('Год получения предыдущего образования');
        CRUD::field('education_level')->label('Уровень образования');
        CRUD::field('specialization')->label('Направление обучения');

    }

    public function export()
    {
        return Excel::download(new ListenersExport(), 'listeners.xlsx');
    }

    public function export_ino()
    {
        return Excel::download(new ListnersExportIno(), 'listeners-ino.xlsx');
    }

    public function export_ino_count()
    {
        return Excel::download(new ListnersExportInoCount(), 'listeners-ino-count.xlsx');
    }

    public function export_duplicate_error()
    {
        return Excel::download(new ListnersExportDuplicate(), 'listeners-duplicate.xlsx');
    }
}
