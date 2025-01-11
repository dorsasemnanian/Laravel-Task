<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use App\Models\Post;

class FetchPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

            if ($response->successful()){
                $posts = $response->json();

                foreach(array_slice($posts, 0, 50) as $postData){
                    post::updateOrCreate(
                        ['id'=> $postData['id']],
                        [
                            'userId'=> $postData['userId'],
                        'title' => $postData['title'],
                        'body'=> $postData['body'],
                        ]
                    );
                }
            }
        }

    }
   
   
   
  
