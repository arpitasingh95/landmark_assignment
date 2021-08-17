<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class smsprovider extends Model
{
    protected $table = 'smsproviders';

    protected $fillable = [
        'providername', 'provider', 'sendurl', 'apikey'
    ];
}
