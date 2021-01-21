<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];


public function setNameAttribute($name): string
{
  return $this->attributes['name'] = ucwords(strtolower($name));
}

public function nominees(): belongsToMany
{
    return $this->belongsToMany(Nominee::class);
}
}
