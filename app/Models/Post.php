<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['category', 'author'];
    
    public function category()
   {
       return $this->belongsTo(Category::class);
   }
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query, array $filters)
    {
        // Metode 1
        // if (request('search')) {    
        // return $query->where('title', 'like', '%' . request('search') .'%')
        //     ->orwhere('body', 'like', '%' . request('search') .'%');
        // }

        // Metode 2 dengan isset dan , array $filters
        // if (isset($filters['search']) ? $filters['search'] : false) {    
        // return $query->where('title', 'like', '%' .$filters['search'] .'%')
        //     ->orwhere('body', 'like', '%' . $filters['search'] .'%');
        // }

        // Metode 3 dengan function when pengganti if
        $query->when($filters['search'] ?? false, function($query, $search)
        {
            return $query->where('title', 'like', '%' . $search .'%')
            ->orWhere('body', 'like', '%' . $search .'%');
        })->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        })->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
                )
        );

    }

}
