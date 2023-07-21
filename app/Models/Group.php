<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'groups';

    protected $fillable = ['name'];

    protected $guarded = ['id', 'created_at', 'updated_at'];


    // Scopes


    // Relations
    public function instrument()
    {
        return $this->belongsTo(Instrument::class);
    }

    public function variables()
    {
        return $this->hasMany(Variable::class);
    }

}
