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

class ListnersExportDuplicate implements WithMapping, WithHeadings, FromQuery, ShouldAutoSize
{
    public function map($listener): array
    {
        return [
            $listener->fio,
            $listener->documents_number,
            $listener->cnt,
            $listener->row_id,
        ];
    }


    public function headings(): array
    {
        return [
            'ФИО',
            "Документ",
            "Количество дублей",
            "Строки с дублями",
        ];
    }

    public function query()
    {
        DB::statement(DB::raw('set @row:=0'));
        $state = Listener::selectRaw("fio, documents_number, count(documents_number) as 'cnt', GROUP_CONCAT(id SEPARATOR ', ')  as 'row_id'"
        )->groupByRaw("documents_number, fio")->havingRaw("count(documents_number) > 1");
        error_log($state->toSql());
        return $state;
    }


}
