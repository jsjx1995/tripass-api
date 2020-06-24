<?php

/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2020-06-13
 * Time: 23:04
 */

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Services\CreateFacilityService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class CreateFacilityController
 *
 * facility_basicinfo, facility_hours, facility_price, facility_spotのレコードを
 * INSERTするためのコントローラです。
 *
 * @Author: Akio
 * @package App\Http\Controllers
 */
class CreateFacilityController extends Controller
{
    /**
     * CreateFacilityController constructor.
     *
     * @param CreateFacilityService $FacilityCreateService
     */
    public function __construct(CreateFacilityService $CreateFacilityService)
    {
        $this->FacilityCreateService = $CreateFacilityService;
    }

    /**
     * facility_basicinfo, facility_hours, facility_price, facility_spotのレコードを
     * レコードを１件追加するためのメソッドです。
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function createRecord(Request $request): JsonResponse
    {

        Log::info($request);
        $content = $request->all();
        // echo json_decode($content, true) ?? [];
        // print_r($content);
        $result = $this->FacilityCreateService->createFacility($request->all());

        return response()->json($result, 200);
    }
}
