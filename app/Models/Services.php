<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reviews;
use App\Models\Appointments;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Services extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name_service",
        "image",
        "status",
        "price",
        "description"
    ];

    public function reviews(): HasMany
    {
        return $this->hasMany(Reviews::class, 'service_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appointments(): BelongsTo
    {
        return $this->belongsTo(Appointments::class, 'service_id');
    }
}
