<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class CreatePostsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create posts and cache';

    /**
     * Execute the console command.
     */
    public function handle() : void
    {
        Post::factory(10)->create();
        Post::all()->each(function($post) {
            Cache::put('posts:' . $post->id, $post);
        });
    }
}
