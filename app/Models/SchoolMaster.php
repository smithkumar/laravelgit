<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SchoolMaster extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
    protected $fillable = [
        'school_name', 'school_address', 'contact_no','no_of_credit',
    ];

}
