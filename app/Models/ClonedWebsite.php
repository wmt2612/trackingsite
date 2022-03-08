<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Validation\Rules\Enum;

final class ClonedWebsiteStatus extends Enum {
    const Active = 1;
    const Deactive = 0;
}
class ClonedWebsite extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cloned_websites';

    protected $fillable = [
        'site_name',
        'status',
        'ip_address',
        'alert_message'
    ];
}
