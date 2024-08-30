<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'path',
        'user_id',
    ];

    public function auth()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gpElement(){
        return $this->hasMany(GroupElement::class, 'post_id');
    }
}

class PostElement extends Model
{
    use HasFactory;

    protected $table = 'post_elements';
    protected $fillable = [
        'group_id',
        'type',
        'content'
    ];
}


class GroupElement extends Model
{
    use HasFactory;

    protected $table = 'groups_elements';
    protected $fillable = [
        'post_id',
        'template'
    ];

    public function elements(){
        return $this->hasMany(PostElement::class, 'group_id');
    }
}
