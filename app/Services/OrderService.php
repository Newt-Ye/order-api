<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

use App\Repositories\OrderRepository;

class OrderService
{
    private $orderRepo;

    public function __construct(OrderRepository $orderRepository) 
    {
        $this->orderRepo = $orderRepository;
    }

    public function getOrderInfoById($id) 
    {
        return $this->orderRepo->getOrderInfoById($id);
    }
}
