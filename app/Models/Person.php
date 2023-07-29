<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;

    const AGE = [
        '0-25' => 'Menor de 25 años',
        '26-35' => 'Entre 26 y 35 años',
        '36-45' => 'Entre 36 y 45 años',
        '46-55' => 'Entre 46 y 55 años',
        '56-999' => 'Mas de 56 años',
    ];

    const SENIORITY = [
        '0-2' => 'Menor de 2 años',
        '3-5' => 'Entre 3 y 5 años',
        '6-10' => 'Entre 6 y 10 años',
        '11-15' => 'Entre 11 y 15 años',
        '15-999' => 'Mas de 15 años',
    ];

    const EDUCATION_LEVEL = [
        'NoBachiller' => 'No Bachiller',
        'Bachiller' => 'Bachiller',
        'Tecnico' => 'Tecnico',
        'Universitario' => 'Universitario',
        'Profesional' => 'Profesional',
        'Post-grado' => 'Post-grado',
    ];

    protected $table = 'people';

    protected $fillable = [
        'user_id',
        'position_id',
        'dependency_id',
        'corporative_group_id',
        'type_appointment_id',
        'first_name',
        'last_name',
        'with_people_charge',
        'gender',
        'age',
        'seniority',
        'education_level',
    ];

    protected $casts = [
        'with_people_charge' => 'boolean',
    ];

    protected $appends = [
        'ageString',
        'seniorityString',
        'educationLevelString',
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    // Appends
    public function getAgeStringAttribute()
    {
        return $this->age ? self::AGE[$this->age] : null;
    }

    public function getSeniorityStringAttribute()
    {
        return $this->seniority ? self::SENIORITY[$this->seniority] : null;
    }

    public function getEducationLevelStringAttribute()
    {
        return $this->education_level ? self::EDUCATION_LEVEL[$this->education_level] : null;
    }

    // Scopes


    // Relations
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function dependency()
    {
        return $this->belongsTo(Dependency::class);
    }

    public function corporativeGroup()
    {
        return $this->belongsTo(CorporativeGroup::class);
    }

    public function typeAppointment()
    {
        return $this->belongsTo(TypeAppointment::class);
    }
}
