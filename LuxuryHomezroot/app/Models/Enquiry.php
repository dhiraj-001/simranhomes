<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'type', 'fname', 'lname', 'email', 'mobile', 'property_name', 'message', 'page_url', 'budget_range', 'countryCode',
    ];
}