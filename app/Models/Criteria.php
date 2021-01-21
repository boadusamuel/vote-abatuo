<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


    public function setNameAttribute($name): string
    {
        return $this->attributes['name'] = ucwords(strtolower($name));
    }
}
