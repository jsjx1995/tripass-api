<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-02-22
 * Time: 13:35
 */
declare(strict_types=1);
namespace App\Http\Controllers;

use App\Services\CreateFacilityMetaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class UserMetaCreateController
 *
 * facilitiesテーブルとfacility_metaテーブルのレコードを
 * INSERTするためのコントローラです。
 *
 * @Author: Akio
 * @package App\Http\Controllers
 */
class CreateFacilityMetaController extends Controller {
  private $FacilityMetaCreateService;

  /**
   * CreateFacilityMetaController constructor.
   *
   * @param CreateFacilityMetaService $FacilityMetaCreateService
   */
  public function __construct(CreateFacilityMetaService $FacilityMetaCreateService) {

    $this->FacilityMetaCreateService = $FacilityMetaCreateService;
  }

  /**
   * facilitiesテーブルとfacility_metaテーブルに
   * 同時に複数件レコードを追加するためのメソッドです。
   *
   * @param Request $request
   * @return JsonResponse
   */
  public function createRecords(Request $request): JsonResponse {

    Log::info($request);
    $result = $this->FacilityMetaCreateService->createFacilityMeta($request->post());

    return response()->json($result, 200);
  }
}
