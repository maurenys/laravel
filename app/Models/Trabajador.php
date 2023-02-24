<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{

    use HasFactory;
    protected $fillable = ['name', 'ci', 'cellphone','photo','date_out','position','email'];

}
