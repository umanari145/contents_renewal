<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Cache;

class Member extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'mem_id';

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    protected $fillable = [
      'name',
      'email',
      'furigana',
      'sex',
      'area',
      'email',
      'traffic',
      'birthday'
    ];

}
