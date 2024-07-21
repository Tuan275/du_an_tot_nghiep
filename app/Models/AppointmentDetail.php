<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Services;
use App\Models\User;
use App\Models\Appointments;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AppointmentDetail extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "service_id",
        "user_id",
        "status",
        "appointment_id",
        "total_price"
    ];

    public function appointments(): HasMany {
        return $this->hasMany(Appointments::class, 'appointment_id');
    }

    public function services(): HasMany {
        return $this->hasMany(Services::class, 'service_id');
    }

    public function users(): HasMany {
        return $this->hasMany(User::class, 'user_id');
    }
}
