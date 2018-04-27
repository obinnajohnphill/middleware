<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $connection = 'mysql';
    protected $table = 'articles';
    protected $fillable = ['title','content'];
}
