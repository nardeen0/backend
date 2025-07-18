<?php

namespace App\Exports;

use App\Models\Listener;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOption\None;

class ListenersExport implements  WithMapping, WithHeadings, FromQuery,WithColumnFormatting, ShouldAutoSize
{
    public function map($listener): array
    {
        return [
            $listener->fio,
            $listener->birthday,
            $listener->country,
            $listener->university,
            $listener->faculty,
            $listener->specialization,
            $listener->group_name,
            $listener->start_year,
            $listener->education_level,
            $listener->time_edu,
            $listener->direction->short_name,
            $listener->documents_number,
            $listener->diplom_num,
            $listener->diplom_year,
            $listener->diplom_place,
            $listener->diplom_napr,
            $listener->email,
            $listener->phone,
            $listener->vk,
            $listener->getImage(),
            null,
            $listener->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'ФИО',
            "Дата рождения",
            "Страна",
            "ВУЗ",
            "Факультет",
            "Направление обучения",
            "Группа",
            "Год начала обучения",
            "Уровень образования",
            "Форма обучения",
            "Программа на ЦК",
            'Документ',
            "Серия и номер диплома",
            "Дата выдачи диплома",
            "Место выдачи диплома",
            "Специальность",
            'Email',
            'Телефон',
            'VK',
            'Изображение',
            "Заявление+2 согласия",
            'Дата записи на курс',
        ];
    }

    public function query()
    {
        return Listener::query();
    }

    public function columnFormats(): array
    {
        return [
            'I' => NumberFormat::FORMAT_DATE_DATETIME,
        ];
    }

}
