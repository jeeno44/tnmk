<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['parent_id', 'title'];

    public function children() {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function sorted()
    {
        return $this->hasMany(Sorted::class,'category_id','id');
    }

    public function product()
    {
        return $this->belongsTo(Prod::class,'id','category_id');
    }

}
