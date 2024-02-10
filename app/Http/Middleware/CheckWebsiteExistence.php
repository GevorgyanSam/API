<?php

namespace App\Http\Middleware;

use App\Models\Website;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckWebsiteExistence
{
    public function handle(Request $request, Closure $next): Response
    {
        $id = $request->route('website');
        $website = Website::find($id);
        if (!$website) {
            return response()->json(['error' => 'website not found'], 404);
        }
        return $next($request);
    }
}
