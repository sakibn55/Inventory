<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EmployeeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_only_logged_in_user_can_see_employee()
    {
        $resp = $this->get('/api/employee');
        $resp->assertStatus(405);
    }
    public function test_logged_in_user_can_see_employee()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');
        $resp = $this->get('/api/employee');
        $resp->assertStatus(200);
    }

    public function test_logged_in_user_can_create_employee()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');
        $resp = $this->post('/api/employee', [
            'name' => "employee_name",
            'email' => "emp@gmail.com",
            'phone' => "5554449999",
            'address' => "Test",
            'sallery' => 5000,
            'nid' => Str::random(16),
            'joining_date' => "2018-05-20",
        ]);
        $resp->assertStatus(201);
        $this->assertDatabaseHas('employees', [
            'name' => 'employee_name',
        ]);
    }

    public function test_logged_in_user_can_read_employee()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');
        $employeeCreate = $this->post('/api/employee', [
            'name' => "employee_name",
            'email' => "emp@gmail.com",
            'phone' => "5554449999",
            'address' => "Test",
            'sallery' => 5000,
            'nid' => Str::random(16),
            'joining_date' => "2018-05-20",
        ]);
        $employee = Employee::first();
        $response = $this->get('/api/employee/' . $employee->id);
        $response->assertStatus(200);
    }
}
