<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClonedWebsite extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cloned_websites';

    protected $fillable = [
        'site_name',
        'status',
    ];
}
