<?php
/**
 * Created by PhpStorm.
 * User: Akio Inoue
 * Date: 2019/03/18
 * Time: 16:21
 */
namespace App\Http\Controllers;

use App\Services\UpdateUserMetaService;
use Illuminate\Http\Request;

class UpdateUserMetaController extends Controller {
  private $updateUserMetaService;

  /**
   * UpdateUserMetaController constructor.
   * コンストラクタです。
   *
   * @param UpdateUserMetaService $updateUserMetaService
   */
  public function __construct(UpdateUserMetaService $updateUserMetaService) {
    $this->updateUserMetaService = $updateUserMetaService;
  }

  /**
   * 施設IDに紐づくuser_metaテーブルのレコードを
   * 1件または複数件更新するメソッドです。
   *
   * @param Request $request 更新リクエスト
   * @return JsonResponse
   */
  public function updateFacilityMetaRecords(Request $request): JsonResponse {

    $result = $this->updateUserMetaService->updateUserMetaRecords($request->post());

    return response()->json($result, 200);

  }
}
