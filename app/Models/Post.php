<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content'
    ];

    /**
     * Génère automatiquement le slug à partir du titre
     */
    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });

        static::updating(function ($post) {
            if ($post->isDirty('title') && empty($post->slug)) {
                $post->slug = Str::slug($post->title);
            }
        });
    }

    /**
     * Retourne l'URL du post
     */
    public function getUrlAttribute()
    {
        return route('posts.show', ['slug' => $this->slug, 'id' => $this->id]);
    }
}
