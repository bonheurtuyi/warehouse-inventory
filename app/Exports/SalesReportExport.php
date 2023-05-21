<?php
// app/Exports/SalesReportExport.php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesReportExport implements FromCollection, WithHeadings
{
    protected $orders;
    protected $revenue;
    protected $statistics;

    public function __construct($orders, $revenue, $statistics)
    {
        $this->orders = $orders;
        $this->revenue = $revenue;
        $this->statistics = $statistics;
    }

    public function collection()
    {
        return $this->orders;
    }

    public function headings(): array
    {
        return [
            'Order ID',
            'Customer',
            'Total Amount',
            // Add more column headings as needed
        ];
    }
}
