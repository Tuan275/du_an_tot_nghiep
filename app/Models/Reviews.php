<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Services;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reviews extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "user_id",
        "service_id",
        "status",
        "description"
    ];

    public function services(): BelongsTo
    {
        return $this->belongsTo(Services::class, 'service_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
