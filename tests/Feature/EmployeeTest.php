<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{

    public function test_create_employee()
    {
        $this->withoutExceptionHandling();
        $data = ['email' => 'test1@mail.com',
            'password' => 'hardpassword'];
        $response = $this->postJson('/api/v1/employee/create', $data);

        $response->assertStatus(200)->assertJson(['result' => 'true']);
    }

    public function test_get_unpaid()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/api/v1/employee/1/unpaid');

        $response->assertStatus(200)->assertJson(['1' => '0']);
    }

    public function test_set_time()
    {
        $this->withoutExceptionHandling();
        $data = ['hours' => '2'];
        $response = $this->postJson('/api/v1/employee/1/time', $data);

        $response->assertStatus(200)->assertJson(['result' => 'true']);
    }

    public function test_pay_all()
    {
        $this->withoutExceptionHandling();
        $response = $this->postJson('/api/v1/employee/1/payall');

        $response->assertStatus(200)->assertJson(['result' => 'true']);
    }

}
