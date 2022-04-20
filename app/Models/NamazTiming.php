<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamazTiming extends Model
{
    use HasFactory;

    protected $fillable = ['year', 'month', 'তারিখ', 'ফজর শুরু', 'ফজর শেষ', 'জোহর শুরু', 'জোহর শেষ', 'আসর শুরু', 'আসর শেষ', 'মাগরিব, ইফতার', 'মাগরিব শেষ', 'এশা শুরু', 'এশা শেষ'];
}
