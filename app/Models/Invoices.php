<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoices extends Model
{
    protected $guarded=[];
    use HasFactory;
    use SoftDeletes;
    public function section ()
    {
      return  $this->belongsTo(Sections::class);
    }
}

