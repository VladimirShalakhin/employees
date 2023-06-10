<?php

namespace App\Models;

use DB;
use Hash;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function workHour(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(WorkHour::class);
    }

    public function PayDay(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PayDay::class);
    }

    public function new(string $email, string $password)
    {
        $hashed_password = Hash::make($password);
        $query = "insert into employee (email, password) values (?, ?)";
        return DB::insert($query, [$email, $hashed_password]);
    }

}
