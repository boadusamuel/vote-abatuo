<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Election extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'period','completed'];


    public function getCreatedAtAttribute($date): string
    {
        return Carbon::parse($date)->format('d M Y');
    }

    public function nominees(): HasMany
    {
        return $this->hasMany(Nominee::class, 'election_id', 'id');
    }
    public function getNameAttribute($name): string
    {
        return $this->attributes['name'] = ucfirst(strtolower($name));
    }
}
