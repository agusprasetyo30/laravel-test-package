<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Test extends Model
{
    use SoftDeletes;
    use Notifiable;

    protected $table = "tests";

    protected $fillable = ['nama', 'nim', 'kelas', 'alamat'];
}
