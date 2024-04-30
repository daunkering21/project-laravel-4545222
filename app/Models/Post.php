<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    // protected $fillable = ['title','excerpt','body'];
    protected $with = ['category','user'];

    public function scopeFilter($query, array $filters){
        // if(isset($filters['search']) ? $filters['search']: false){
        //     return $query->where('title','LIKE','%'. $filters['search'] . '%')
        //           ->orWhere('body','LIKE','%'. $filters['search'] . '%')
        //           ->orWhere('excerpt','LIKE','%'. $filters['search'] . '%');
        // }
        // $query->when(isset($filters['search']), function($query) use ($filters) {
        //     return $query->where('title', 'LIKE', '%' . $filters['search'] . '%')
        //                  ->orWhere('body', 'LIKE', '%' . $filters['search'] . '%')
        //                  ->orWhere('excerpt', 'LIKE', '%' . $filters['search'] . '%');
        // });
    
        // $query->when(isset($filters['category']), function($query) use ($filters) {
        //     return $query->whereHas('category', function($query) use ($filters) {
        //         $query->where('slug', $filters['category']);
        //     });
        // });
        // CEK LAGI NANTI DISINI====================================================================
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where('title', 'like', '%' . $search . '%')
                         ->orWhere('body', 'like', '%' . $search . '%');
        });
        
        $query->when($filters['category'] ?? false, function($query, $category) {
            return $query->whereHas('category', function($query) use ($category) {
                   $query->where('slug', $category);
            });
        });

        // $query ->when($filters['user'] ?? false, fn($query, $user)=>
        //     $query->whereHas('user', fn($query)=>
        //     $query->where('username','user')
        //     )
        // );
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function getRouteKeyName(): string
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function postCount(){
        return Post::all()->count();
    }
}

