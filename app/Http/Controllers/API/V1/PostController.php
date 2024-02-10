<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Posts\StoreRequest;
use App\Http\Requests\API\V1\Posts\UpdateRequest;
use App\Services\PostService;

class PostController extends Controller
{
    public function index(int $website, PostService $service)
    {
        return $service->all($website);
    }

    public function store(int $website, StoreRequest $request, PostService $service)
    {
        $data = $request->validated();
        $data['website'] = $website;
        $post = $service->store($data);
        return $service->notify($post);
    }

    public function show(int $website, int $post, PostService $service)
    {
        return $service->show($website, $post);
    }

    public function update(int $website, int $post, UpdateRequest $request, PostService $service)
    {
        $data = $request->validated();
        return $service->update($website, $post, $data);
    }

    public function destroy(int $website, int $post, PostService $service)
    {
        return $service->destroy($website, $post);
    }
}
