<?php

namespace App\Services;

use App\Http\Resources\API\V1\WebsiteResource;
use App\Models\Subscriber;
use App\Models\Website;

class WebsiteService
{
    public function all()
    {
        $resource = Website::all();
        return WebsiteResource::collection($resource);
    }

    public function store(array $data)
    {
        Website::create([
            'name' => $data["name"],
            'created_at' => now()
        ]);
        return response()->json(['message' => 'website created successfully'], 201);
    }

    public function show(int $id)
    {
        $resource = Website::find($id);
        if (!$resource) {
            return response()->json(['error' => 'website not found'], 404);
        }
        return new WebsiteResource($resource);
    }

    public function subscribe(int $website, array $data)
    {
        if ($this->missing($website)) {
            return response()->json(['error' => 'website not found'], 404);
        }
        $count = Subscriber::where('website_id', $website)
            ->where('email', $data['email'])
            ->count();
        if ($count) {
            return response()->json(['error' => 'you have already subscribed to this website'], 403);
        }
        Subscriber::create([
            'website_id' => $website,
            'email' => $data['email'],
            'created_at' => now()
        ]);
        return response()->json(['message' => 'you have successfully subscribed'], 200);
    }

    public function missing(int $website): bool
    {
        $resource = Website::find($website);
        return !$resource ? true : false;
    }
}
