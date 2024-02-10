<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Websites\StoreRequest;
use App\Http\Requests\API\V1\Websites\SubscribeRequest;
use App\Services\WebsiteService;

class WebsiteController extends Controller
{
    public function index(WebsiteService $service)
    {
        return $service->all();
    }

    public function store(StoreRequest $request, WebsiteService $service)
    {
        $data = $request->validated();
        return $service->store($data);
    }

    public function show(int $id, WebsiteService $service)
    {
        return $service->show($id);
    }

    public function subscribe(int $website, SubscribeRequest $request, WebsiteService $service)
    {
        $data = $request->validated();
        return $service->subscribe($website, $data);
    }
}
