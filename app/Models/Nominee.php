<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Nominee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'department_id', 'election_id'];


    public function votes(): belongsToMany
    {
        return $this->belongsToMany(Vote::class, 'votes', 'nominee_id');
    }

    public function election(): BelongsTo
    {
        return $this->belongsTo(Election::class, 'election_id', 'id' );
    }

    public function department(): belongsTo
    {
        return $this->belongsTo(Department::class);
    }

    public function setNameAttribute($name): string
    {
        return $this->attributes['name'] = ucwords(strtolower($name));
    }

    public function user(): HasOneThrough
    {
        return $this->hasOneThrough(User::class, Vote::class, 'user_id', 'id');
    }
}
