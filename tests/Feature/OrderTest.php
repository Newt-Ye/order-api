<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    private $testData = [
        'id' => 'A0000001',
        'name' => 'Melody Holiday Inn',
        'address' => [
            'city' => 'taipei-city',
            'district' => 'da-an-district',
            'street' => 'fuxing-south-road',
        ],
        'price' => 2050,
        'currency' => 'TWD',
    ];

    public function testCreateOrder()
    {
        $testData = $this->testData;
        $response = $this->postJson('/api/orders', $testData);
    
        $response->assertStatus(200);
        $this->assertDatabaseHas('orders_twd', ['id' => 'A0000001']);
    }

    public function testCreateOrderSuccess()
    {
        $testData = $this->testData;

        $response = $this->postJson('/api/orders', $testData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('orders_twd', [
            'id' => 'A0000001'
        ]);
    }

    public function testCreateOrderFail()
    {
        $testData = $this->testData;
        $testData['currency'] = "ZXC";

        $response = $this->postJson('/api/orders', $testData);

        $response->assertStatus(422);
    }

    public function testGetOrderInfoById()
    {
        $testData = $this->testData;
        $testData['address'] = json_encode($testData['address']);

        DB::table('orders_twd')->insert($testData);

        $response = $this->get('/api/orders/'.$testData['id']);

        $response->assertStatus(200)
            ->assertJson([
                "id" => $testData['id']
            ]);
    }
}
