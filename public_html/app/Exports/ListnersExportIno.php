<?php

namespace App\Exports;

use App\Models\Listener;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithLimit;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOption\None;

class ListnersExportIno implements WithMapping, WithHeadings, FromQuery, ShouldAutoSize
{
    public function map($listener): array
    {
        $fio = preg_replace('!\s+!', ' ', $listener->fio);
        $first_name = explode(' ', $fio)[0];
        if (sizeof(explode(' ', $fio)) > 1) {
            $name = explode(' ', $fio)[1];
        }
        else {
            $name = '';
        }

        $last_name = implode(' ', array_slice(explode(' ', $fio), 2));
        if ($listener->dir_type == 0){
            $dir_type = "не IT";
        } else {
            $dir_type = "IT";
        }
        return [
            $listener->row,
            $first_name,
            $name,
            $last_name,
            $listener->phone,
            $listener->birthday,
            $listener->email,
            $listener->documents_number,
            $listener->specialization,
            $listener->dir_name . " (ДПО)",
            null,
            $dir_type,
        ];
    }


    public function headings(): array
    {
        return [
            '№п/п',
            "Фамилия",
            "Имя",
            "Отчество",
            "Телефон",
            "Дата рождения",
            "E-mail",
            "Номер СНИЛС",
            "Наименование ОПОП, по которой проходит обучение Обучающийся",
            "Наименование ДПП ПП (с указанием подвида), по которой проходит обучение Обучающийся",
            "Сроки реализации ДПП ПП",
            'Направление Обучения'
        ];
    }

    public function query()
    {
        DB::statement(DB::raw('set @row:=0'));
        $state = Listener::selectRaw('*,
        @row:=@row+1 as "row",
        directions.name as dir_name, directions.for_it as dir_type'
        )->join('directions', 'directions.id', '=', 'direction_id');
//        error_log($state->toSql());
        return $state;
    }


}
