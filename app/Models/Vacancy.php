<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vacancy extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'job_title',
        'description',
        'location',
        'paycheck',
        'contract_term',
        'working_hours',
        'company_id',
    ];

    public function registrations(): hasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function appointments(): hasMany
    {
        return $this->hasMany(Appointment::class);
    }

    public function company(): belongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function qualifications(): BelongsToMany
    {
        return $this->belongsToMany(Qualification::class, 'qualification_vacancy');
    }

    public function verifiedAppointments(): HasMany
    {
        return $this->hasMany(Appointment::class)->where('verified', 1);
    }
}
