<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\JsonResponse;

class BannerApiController extends Controller
{
    /**
     * Get list of active banners for hotspot landing page
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $banners = Banner::where('is_active', true)
            ->orderBy('order', 'asc')
            ->orderBy('created_at', 'desc')
            ->get([
                'id',
                'title',
                'image',
                'link_url',
                'is_active',
                'order',
                'created_at',
            ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Active banners retrieved successfully',
            'count' => $banners->count(),
            'data' => $banners,
        ], 200, [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'GET, OPTIONS',
            'Access-Control-Allow-Headers' => 'Content-Type, Authorization, X-Requested-With',
        ]);
    }
}
