<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    // เพิ่มฟิลด์ที่ต้องการทำการ mass assignment ที่นี่
    protected $fillable = [
        'name',    // ชื่อบริษัท
        'email',   // อีเมลบริษัท
        'address', // ที่อยู่บริษัท
    ];
}