<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use App\Models\Article;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $tags = \App\Models\Tag::factory(10)->create();
        $category = \App\Models\Category::factory(5)->create();
        $users = \App\Models\User::factory(10)->create();



        $tags_id = $tags->pluck('id');

       $category->each(function ($category) use ($tags_id){
           $articles = Article::factory(6)->create([
               'category_id' => $category->id]);



           $articles->each(function ($article) use ($tags_id){
               \App\Models\Comment::factory(rand(0,10))->create([
                  'article_id' => $article->id,
                   'user_id' => rand(1,10)
               ]);
               $article->tags()->attach($tags_id->random(3));

           });
           $article_id = $articles->first()->id;
           \App\Models\MainBanner::factory(1)->create(['article_id'=> $article_id]);


       });






    }
}
