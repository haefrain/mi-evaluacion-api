<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'role_id',
        'type_document',
        'document_number',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'role_id',
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $with = ['person', 'role', 'user_instruments'];

    protected $appends = ['status'];

    public function getAuthIdentifierName() {
        return 'document_number';
    }


    public function getStatusAttribute()
    {
        $userInstrument = $this->user_instruments()->first();
        if (is_null($userInstrument)) {
            return null;
        }
        $status = null;
        if ($userInstrument->page <= 0) {
            $status = 'Pendiente';
        }

        $totalPages = ceil(Question::all()->count() / 3);

        if ($userInstrument->page > 0 && $userInstrument->page < $totalPages) {
            $status = 'En curso';
        }

        if ($userInstrument->page >= $totalPages) {
            $status = 'Finalizado';
        }

        return $status;
    }

    // Relation
    public function role() {
        return $this->belongsTo(Role::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function instruments()
    {
        return $this->belongsToMany(Instrument::class);
    }

    public function user_instruments()
    {
        return $this->hasMany(UserInstrument::class);
    }

    public function person()
    {
        return $this->hasOne(Person::class);
    }
}
