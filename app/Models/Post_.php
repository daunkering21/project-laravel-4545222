<?php

namespace App\Models;

class Post
{
   private static $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug"=> "judul-post-pertama",
            "author" => "Charles",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit eaque nisi minima eligendi. Eius eos numquam perferendis laudantium dolore excepturi, consequatur voluptatum expedita odit perspiciatis sequi unde itaque tempora nihil beatae iusto id sed deleniti obcaecati nulla, facilis, repellendus maxime minus quisquam. Adipisci dolores consectetur quam. Dolorem et vero architecto quibusdam deserunt mollitia. Recusandae deserunt exercitationem sequi doloremque iure quasi quas rerum dignissimos id officiis velit vel, culpa, qui praesentium optio eius cupiditate omnis ipsum laboriosam assumenda aliquid at tempora?"
        ],
        [
            "title" => "Judul Post kedua",
            "slug"=> "judul-post-kedua",
            "author" => "Joshua",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex reiciendis omnis impedit odit quam magni, soluta dolore saepe, obcaecati ipsa, consequuntur fugiat sapiente animi illo eaque facere adipisci voluptatibus! Deleniti placeat enim iste, similique necessitatibus hic quo esse quisquam amet deserunt explicabo quam omnis consequuntur at commodi. Molestiae amet voluptates velit blanditiis tenetur vero eos sequi, tempore in dolorum autem mollitia officia pariatur, molestias suscipit aperiam quaerat, maiores quisquam repellat architecto repudiandae ipsum doloribus culpa. Temporibus error, aut blanditiis dicta quae ea veniam labore totam voluptatum, explicabo neque cumque vitae doloremque nesciunt minima beatae natus aspernatur iusto voluptatem? Quaerat, error!"
        ],
    ];
    
    public static function all(){
        return collect(self::$blog_posts);
    }
    public static function find($slug){
        $posts = static::all();
        // $post = [] ;
        //     foreach($posts as $p){
        //     if($p["slug"] === $slug){
        //         $post = $p;
        //     }
        // }
        return $posts->firstWhere('slug' , $slug);
    }
}
