<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Services;
use App\Models\User;
use App\Models\AppointmentDetail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointments extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "service_id",
        "schedule",
        "status",
        "user_id"
    ];

    public function services(): HasMany
    {
        return $this->hasMany(Services::class, 'service_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function appointment_detail(): BelongsTo
    {
        return $this->belongsTo(AppointmentDetail::class, 'service_id');
    }
}
