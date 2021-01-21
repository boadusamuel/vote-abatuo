<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Facades\DB;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'nominee_id', 'communication', 'ownership', 'respect','integrity','professionalism','team_work'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }
    public function nominee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Nominee::class, 'nominee_id', 'id');
    }
    public function election(): hasOneThrough
    {
        return $this->hasOneThrough(Election::class, Nominee::class, 'election_id', 'id');
    }


}
