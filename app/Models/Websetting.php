<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Websetting extends Model
{
    protected $fillable = [
        'address',
        'phone',
        'email',
        'facebook',
        'twitter',
        'linkedin',
        'youtube',
        'instagram',
        'whatsapp',
        'offer_title',
        'fixel_setup_text',
        'sms_text',
        'webtitle_text',
        'status',
        'photo',
        'favicon',
        'new_photo',
        'new_favicon',
    ];
}
