<?php

namespace App\Services;

use App\Http\Resources\API\V1\PostResource;
use App\Jobs\NotifySubscribersJob;
use App\Models\Post;
use App\Models\Subscriber;

class PostService
{
    public function all(int $website)
    {
        $resource = Post::where('status', 1)
            ->where('website_id', $website)
            ->get();
        return PostResource::collection($resource);
    }

    public function store(array $data)
    {
        return Post::create([
            'website_id' => $data["website"],
            'title' => $data["title"],
            'description' => $data["description"],
            'status' => 1,
            'created_at' => now()
        ]);
    }

    public function show(int $website, int $post)
    {
        $resource = Post::where('status', 1)
            ->where('website_id', $website)
            ->where('id', $post)
            ->first();
        if (!$resource) {
            return response()->json(['error' => 'post not found'], 404);
        }
        return new PostResource($resource);
    }

    public function update(int $website, int $post, $data)
    {
        Post::where('status', 1)
            ->where('website_id', $website)
            ->where('id', $post)
            ->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'updated_at' => now()
            ]);
        return response()->json(['message' => 'post updated successfully'], 200);
    }

    public function destroy(int $website, int $post)
    {
        Post::where('status', 1)
            ->where('website_id', $website)
            ->where('id', $post)
            ->update([
                'status' => 0,
                'updated_at' => now()
            ]);
        return response()->json(['message' => 'post deleted successfully'], 200);
    }

    public function notify(Post $post)
    {
        $subscribers = Subscriber::where('website_id', $post->website_id)
            ->get();
        if (!$subscribers->count()) {
            return response()->json(['message' => 'post created successfully'], 201);
        }
        NotifySubscribersJob::dispatch($post, $subscribers);
        return response()->json(['message' => 'post created successfully'], 201);
    }
}
