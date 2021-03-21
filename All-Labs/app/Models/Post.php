<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use HasFactory;
    use Sluggable;

    // protected $primaryKey = 'slug';
    // public $incrementing = false;

    protected $fillable = [
        'title',
        'description',
        'user_id'
    ];



    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'id']
            ]
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
