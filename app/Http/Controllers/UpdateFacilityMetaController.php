<?php
/**
 * Created by PhpStorm.
 * User: Akio Inoue
 * Date: 2019/03/18
 * Time: 16:21
 */

namespace App\Http\Controllers;

use App\Services\UpdateFacilityMetaService;
use Illuminate\Http\Request;

class UpdateFacilityMetaController extends Controller {
  private $updateFacilityMetaService;

  /**
   * UpdateFacilityMetaController constructor.
   * コンストラクタです。
   *
   * @param UpdateFacilityMetaService $updateFacilityMetaService
   */
  public function __construct(UpdateFacilityMetaService $updateFacilityMetaService) {
    $this->updateFacilityMetaService = $updateFacilityMetaService;
  }

  /**
   * 施設IDに紐づくfacility_metaテーブルのレコードを
   * 1件または複数件更新するメソッドです。
   *
   * @param Request $request 更新リクエスト
   * @return JsonResponse
   */
  public function updateFacilityMetaRecords(Request $request): JsonResponse {

    $result = $this->updateFacilityMetaService->updateFacilityMetaRecords($request->post());

    return response()->json($result, 200);

  }
}
