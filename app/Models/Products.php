<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $guarded=[];
    use HasFactory;

    public function section()
    {
        return $this->belongsTo(Sections::class);
    }
}
