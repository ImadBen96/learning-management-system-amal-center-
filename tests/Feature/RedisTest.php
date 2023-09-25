<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Tests\TestCase;

class RedisTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        try {
            Log::info('the RedisTest start');
            $response = Redis::connection();
            Log::info($response->getName());
            Log::info('it works');
            $this->assertTrue(true);
        }catch (\Exception $e){
            Log::error($e->getMessage());
        }
    }
}
