<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Repositories\OrderRepository;

use App\Events\OrderCreated;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function testGetOrderInfo()
    {
        $orderRepo = new OrderRepository();
        $orderRepo->getOrderInfoById('A0000001');
        $this->assertTrue(true);
    }

    public function testCreateCorrectOrder()
    {   
        // 測試資料
        $testData = [
            "id"      => "A0000001",
            "name"    => "Melody Holiday Tom",
            "address" => [
                "city"      => "taipei-city",
                "district"  => "da-an-district",
                "street"    => "fuxing-south-road"
            ],
            "price"    => 2050,
            "currency" => "TWD"
        ];

        event(new OrderCreated($testData));

        $this->assertDatabaseHas('orders_twd', [
            'id' => 'A0000001',
        ]);
    }

    public function testCreateErrorOrder()
    {
        $this->expectException(\Exception::class);

        $testData = [
            "id"      => "A0000001",
            "name"    => "Melody Holiday Tom",
            "address" => [
                "city"      => "taipei-city",
                "district"  => "da-an-district",
                "street"    => "fuxing-south-road"
            ],
            "price"    => 2050,
            "currency" => "ZXC"
        ];

        event(new OrderCreated($testData));
    }
}
