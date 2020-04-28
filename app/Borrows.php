<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrows extends Model
{
    protected $fillable = ['user_id', 'book_id', 'book_name', 'borrowed', 'returned', 'confirmed'];
}
