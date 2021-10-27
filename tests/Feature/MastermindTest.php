<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Classes\Mastermind as Game;

class MastermindTest extends TestCase
{
    /**
     * Testing Mastermind.
     *
     * @test
     */
    function test_mastermind_win()
    {
        $response = $this->get('/mastermind/?data=1,2,3,4');

        $response->assertStatus(200);
        $response->assertSee('You win!');
    }

    function test_mastermind_fail()
    {

        $init = [1, 2, 3, 4];
        $play = [1, 2, 3, 5];
        $mastermind = new Game($init);
        $result = $mastermind->GetHints($play);

        $black = count($init) - count($result);
        $white = count($result);
        $this->assertEquals(3, $black);
        $this->assertEquals(1, $white);
        $this->assertEquals([3 => 5], $result);

    }
}
