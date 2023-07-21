<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    use HasFactory, SoftDeletes;

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
        'gender'
    ];

    protected $guarded = ['id', 'created_at', 'updated_at'];


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
