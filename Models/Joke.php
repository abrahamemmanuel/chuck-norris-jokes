<?php

namespace Emmy\chuckNorrisJokes\Models;

use Illuminate\Database\Eloquoent\Model;

class Joke extends Model
{
  protected $guarded = [];
  
  protected $tables = 'jokes';
}
