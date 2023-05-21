<?php

namespace App\Http\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderSalesReport extends Component
{
    public $startDate;
    public $endDate;
    public $orders;

    public function render()
    {
        $this->orders = Order::whereBetween('created_at', [$this->startDate, $this->endDate])
            ->get();
        return view('livewire.order-sales-report');
    }

    public function searchOrders()
    {
        $this->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
        ]);

    }
}
