<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'questions';

    protected $fillable = ['sub_variable_id', 'title', 'description', 'sort'];

    protected $guarded = ['id', 'created_at', 'updated_at'];


    // Scopes


    // Relations
    public function subVariable()
    {
        return $this->belongsTo(SubVariable::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
