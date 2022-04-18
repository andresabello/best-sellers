<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetNYTBestSellerRequest;
use App\Services\NYTService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;

class NYTBestSellerController extends Controller
{
    /**
     * @param GetNYTBestSellerRequest $request
     * @param NYTService $service
     * @return JsonResponse
     * @throws GuzzleException
     */
    public function __invoke(GetNYTBestSellerRequest $request, NYTService $service): JsonResponse
    {
        return response()->json([
            'books' => $service->getBooks($request)
        ]);
    }
}
