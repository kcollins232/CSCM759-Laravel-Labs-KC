<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'axolotl_id',
    ];

    public function axolotl()
    {
        return $this->belongsTo(Axolotl::class);
    }
}

