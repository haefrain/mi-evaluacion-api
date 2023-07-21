<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubVariable extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sub_variables';

    protected $fillable = ['variable_id', 'name'];

    protected $guarded = ['id', 'created_at', 'updated_at'];


    // Scopes


    // Relations
    public function variable()
    {
        return $this->belongsTo(Variable::class);
    }
}
