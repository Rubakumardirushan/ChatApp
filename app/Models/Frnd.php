<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frnd extends Model
{
    use HasFactory;
    protected $fillable = ['frnd_request_sender_id','frnd_request_receiver_id','status','frnd_request_accepted_at'];
}
