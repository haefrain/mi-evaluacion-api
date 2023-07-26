<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserInstrument extends Pivot
{
    protected $table = 'users_instruments';

    protected $fillable = ['user_id', 'instrument_id'];
}
