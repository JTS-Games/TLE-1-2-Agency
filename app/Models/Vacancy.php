<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
        'competence',
        'contract_term',
        'working_hours',
        'company_id',
    ];
    public function registrations():hasMany
    {
        return $this->hasMany(Registration::class);
    }

    public function company():belongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
