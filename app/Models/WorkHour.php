<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkHour extends Model
{
    use HasFactory;

    const Pay_Per_Hour = 10;

    public $timestamps = false;
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function setTime(int $employee_id, int $hours): bool
    {
        $query = "insert into employees.work_hours (employee_id, hours) values (?, ?)";
        return DB::insert($query, [$employee_id, $hours]);
    }

    public function getUnpaid(int $employee_id)
    {
        $query = "select sum(hours) as hours from employees.work_hours wh where status_id = 1 and employee_id = ?";
        $result = DB::select($query, [$employee_id]);
        $result = json_decode(json_encode($result), true);
        return ($result[0]['hours'] * self::Pay_Per_Hour);
    }

    public function payAll(int $employee_id)
    {
        //создание платежной транзакции
        $query = "update employees.work_hours set status_id = 2 where employee_id = ?;";
        $result = DB::update($query, [$employee_id]);
        //еще один запрос с вставкой в таблицу значения id_employee и даты, когда произошла выплата
        if ($result) {
            $query = "insert into employees.pay_days (employee_id) values (?)";
            $result = DB::insert($query, [$employee_id]);
        }
        return $result;
    }
}
