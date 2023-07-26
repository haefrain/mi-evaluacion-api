<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variable extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'variables';

    protected $fillable = ['group_id', 'name'];

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $with = ['group'];

    // Scopes


    // Relations
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function subVariables()
    {
        return $this->hasMany(SubVariable::class);
    }
}
