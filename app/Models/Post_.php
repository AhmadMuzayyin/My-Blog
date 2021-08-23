<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post_
{
    use HasFactory;

    private static $blog_posts = [
        [
        "title" => "Judul Pertama",
        "slug" => "judul-pertama",
        "author" => "Ahmad Muzayyin",
        "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa maxime tempore quo qui commodi modi voluptatum ut blanditiis vel. Placeat quae maiores animi dolores odit!"
        ],
        [
        "title" => "Judul Kedua",
        "slug" => "judul-kedua",
        "author" => "Ahmad",
        "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa maxime tempore quo qui commodi modi voluptatum ut blanditiis vel. Placeat quae maiores animi dolores odit!"
        ],
        [
        "title" => "Judul Ketiga",
        "slug" => "judul-ketiga",
        "author" => "Ubed",
        "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa maxime tempore quo qui commodi modi voluptatum ut blanditiis vel. Placeat quae maiores animi dolores odit!"
        ]
        ];
        
    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }

}
