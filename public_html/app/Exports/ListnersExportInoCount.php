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

class ListnersExportInoCount implements WithMapping, WithHeadings, FromQuery, ShouldAutoSize
{
    public function map($listener): array
    {
        $spec_num = explode(' ', $listener->specialization)[0];
        $spec_name = implode(' ', array_slice(explode(' ', $listener->specialization), 1));
        return [
            $listener->dir_name . " (ДПО)",
            $listener->otrasl,
            $spec_num,
            $spec_name,
            $listener->cource,
            $listener->cnt,
        ];
    }


    public function headings(): array
    {
        if (date('n') < 7) {
            $year = date('Y') - 1;
        } else {
            $year = date('Y');
        }
        return [
            '1. Наименование ДПП ПП на которые осуществляется набор в ' . $year . ' году',
            "2. Отраслевая принадлежность ДПП ПП",
            "3. Код  НПС",
            "4. Наименование НПС по основной образовательной программе",
            "5. Курс обучающихся по основной программе",
            "6. Количество обучающихся по основной образовательной программе",
        ];
    }

    public function query()
    {
        DB::statement(DB::raw('set @row:=0'));
        $state = Listener::selectRaw(
            "directions.name as dir_name,
            case when directions.name like '%троитель%' then '10. Строительство' else '5. Информационно-коммуникационные технологии' end as otrasl,
            specialization,
            case when month(CURDATE()) >= 9 then year(CURDATE()) - start_year + 1 else year(CURDATE()) - start_year end as cource,
            count(*) as 'cnt'"
        )->join('directions', 'directions.id', '=', 'direction_id')->
        groupByRaw(
            "directions.name, case when directions.name like '%троитель%' then '10. Строительство' else '5. Информационно-коммуникационные технологии' end,
specialization,
case when month(CURDATE()) >= 9 then year(CURDATE()) - start_year + 1 else year(CURDATE()) - start_year end");
        error_log($state->toSql());
        return $state;
    }


}
