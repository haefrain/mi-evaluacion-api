<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'companies';

    protected $fillable = ['name'];

    protected $guarded = ['id', 'created_at', 'updated_at'];


    // Scopes


    // Relations
    public function instruments()
    {
        return $this->hasMany(Instrument::class);
    }

    public function positions()
    {
        return $this->hasMany(Position::class);
    }

    public function dependencies()
    {
        return $this->hasMany(Dependency::class);
    }
}
