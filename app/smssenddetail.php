<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class smssenddetail extends Model
{
    protected $table = 'smssenddetails';

    protected $fillable = [
        'phone', 'message', 'provider_id', 'status'
    ];

    static public function savesmsdata($phone, $providerid, $message)
    {
        $smssend = new smssenddetail();
        $smssend->phone =  $phone;
        $smssend->provider_id =  $providerid;
        $smssend->message =  $message;
        $smssend->status = 'sent';
        return $smssend->save();
    }
}
