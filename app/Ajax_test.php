<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ajax_test extends Model
{
    protected $table = 'ajax_test';
    protected $fillable = ['task', 'description', 'done'];
}
