<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/* FormRequests */
use App\Http\Requests\CreateOrderRequest;
/* Services */
use App\Services\OrderService;
/* Events */
use App\Events\OrderCreated;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService) 
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        //
    }

    public function show($id)
    {
        
        $order = $this->orderService->getOrderInfoById($id);
        if (!$order) {
            return response()->json(['message' => '訂單不存在'], 404);
        }

        return response()->json($order, 200);
    }

    public function store(CreateOrderRequest $request)
    {   
        // 驗證
        $validated = $request->validated();
        
        event(new OrderCreated($validated));

        return response()->json(['message' => '訂單處理已開始'], 200);
    }
}
