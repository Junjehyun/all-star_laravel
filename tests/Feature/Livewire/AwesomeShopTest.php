<?php

namespace Tests\Feature\Livewire;

use App\Livewire\AwesomeShop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AwesomeShopTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AwesomeShop::class)
            ->assertStatus(200);
    }
}
