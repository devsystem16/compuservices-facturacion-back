<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ReporteExport implements FromArray, WithHeadings, WithTitle
{
    protected $headers;
    protected $rows;
    protected $title;

    public function __construct(array $headers, array $rows, string $title = 'Reporte')
    {
        $this->headers = $headers;
        $this->rows = $rows;
        $this->title = $title;
    }

    public function array(): array
    {
        return $this->rows;
    }

    public function headings(): array
    {
        return $this->headers;
    }

    public function title(): string
    {
        return $this->title;
    }
}
