<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;

    protected $table = 'pages';
    protected $fillable = ['slug','title','content'];

    public function parent()
    {
        return $this->hasOne('App\Models\Pages', 'id', 'parent_id')->orderBy('id');
    }

    public function children()
    {

        return $this->hasMany('App\Models\Pages', 'parent_id', 'id')->orderBy('id');
    }

    public static function tree()
    {
        return static::with(implode('.', array_fill(0, 100, 'children')))->where('parent_id', '=', '0')->orderBy('id')->get();
    }

}
