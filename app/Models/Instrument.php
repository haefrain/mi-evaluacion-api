<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instrument extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'instruments';

    protected $fillable = ['company_id', 'title', 'description'];

    protected $guarded = ['id', 'created_at', 'updated_at'];


    // Scopes


    // Relations
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function groups()
    {
        return $this->hasMany(Group::class);
    }


    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
