<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NumberTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_correct_data()
    {
        $response = $this->call('POST', '/calculate', ["first_number" => 3, "second_number" => 5]);

        $response->assertStatus(200);
        $response->assertViewHasAll([
            'result' => [1,2,"Frizz",4,"Buzz","Frizz",7,8,"Frizz","Buzz",11,"Frizz",13,14,"FrizzBuzz",16,17,"Frizz",19,"Buzz","Frizz",22,23,"Frizz","Buzz",26,"Frizz",28,29,"FrizzBuzz",31,32,"Frizz",34,"Buzz","Frizz",37,38,"Frizz","Buzz",41,"Frizz",43,44,"FrizzBuzz",46,47,"Frizz",49,"Buzz","Frizz",52,53,"Frizz","Buzz",56,"Frizz",58,59,"FrizzBuzz",61,62,"Frizz",64,"Buzz","Frizz",67,68,"Frizz","Buzz",71,"Frizz",73,74,"FrizzBuzz",76,77,"Frizz",79,"Buzz","Frizz",82,83,"Frizz","Buzz",86,"Frizz",88,89,"FrizzBuzz",91,92,"Frizz",94,"Buzz","Frizz",97,98,"Frizz","Buzz"]
        ]);
    }
    public function test_wrong_data()
    {
        $response = $this->call('POST', '/calculate', ["first_number" => 13, "second_number" => 5]);

        $response->assertStatus(302);
        $response->assertSessionDoesntHaveErrors([
            'second_number'
        ]);
        $response->assertSessionHasErrors([
            'first_number'
        ]);
       
    }
}
