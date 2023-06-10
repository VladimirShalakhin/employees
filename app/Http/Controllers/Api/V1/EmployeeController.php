<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Models\WorkHour;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Employee::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function new(Request $request)
    {
        $employeeModel = new Employee();
        //validation
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(8)]
        ], [
            'email' => 'email должен быть задан корректно',
            'password' => 'пароль должен иметь длину не менее 8 символов'
        ]);
        if ($validator->fails()) {
            return ($validator->messages());
        }
        $bodyContent = json_decode($request->getContent(), true);
        $email = $bodyContent['email'];
        $password = $bodyContent['password'];
        try {
            $result = $employeeModel->new($email, $password);
        } catch (Exception $e) {
            throw new Exception("Произошла ошибка при создании сотрудника");
        }
        return([
            'result' => $result
        ]);
    }

    public function setTime(Request $request, int $employee_id)
    {
        $workHourModel = new WorkHour();
        $validator = Validator::make($request->all(), [
            'hours' => ['required', 'numeric', 'min:0.5', 'max:12']
        ], [
            'hours' => 'рабочее время должно являться числом и не может быть менее 0.5 часа или более 12 часов'
        ]);
        if ($validator->fails()) {
            return ($validator->messages());
        }

        $bodyContent = json_decode($request->getContent(), true);
        $hours = $bodyContent['hours'];
        try {
            $result = $workHourModel->setTime($employee_id, $hours);
        } catch (Exception $e) {
            throw new Exception("Произошла ошибка при занесении рабочего времени");
        }
        return([
            'result' => $result
        ]);
    }

    public function getUnpaid(Request $request, int $employee_id)
    {
        $workHourModel = new WorkHour();
        try {
            $result = $workHourModel->getUnpaid($employee_id);
        } catch (Exception $e) {
            throw new Exception("Произошла ошибка при получении невыплаченных средств");
        }
        return([
            $employee_id => $result
        ]);
    }

    public function payAll(Request $request, int $employee_id)
    {
        $workHourModel = new WorkHour();
        try {
            $result = $workHourModel->payAll($employee_id);
        } catch (Exception $e) {
            throw new Exception("Произошла ошибка при занесении рабочего времени");
        }
        if ($result) {
            return([
                'result' => true
            ]);
        } else {
            throw new Exception("Все средства уже были выплачены или произошла другая ошибка", 400);
        }

    }
}
