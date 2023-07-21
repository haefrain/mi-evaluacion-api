<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dependency extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'dependencies';

    protected $fillable = ['company_id', 'name'];

    protected $guarded = ['id', 'created_at', 'updated_at'];


    // Scopes


    // Relations
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
