<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-02-22
 * Time: 13:18
 */
namespace App\Http\Controllers;


use App\Services\ReadFacilityMetaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class ReadFacilityMetaController
 *
 * Class facility_metaテーブルの情報を取得するためのコントローラです。
 *
 * @Author: Akio Inoue
 * @package App\Http\Controllers
 */
class ReadFacilityMetaController extends Controller {
  private $readFacilityMetaService;

  /**
   * ReadFacilityMetaController constructor.
   * コンストラクタです。
   *
   * @param ReadFacilityMetaService $readFacilityMetaService
   */
  public function __construct(ReadFacilityMetaService $readFacilityMetaService) {

    $this->readFacilityMetaService = $readFacilityMetaService;
  }

//  /**
//   * 施設IDとmeta_keyに紐づくfacility_metaテーブルのレコードを
//   * 1件取得するメソッドです。
//   *
//   * @param Request $request リクエスト
//   * @return JsonResponse
//   */
//  public function findFacilityRecord(Request $request): JsonResponse {
//    Log::info($request);
//
//    $facilityMeta = $this->readFacilityMetaService->findFacilityMetaRecord((int)$request->get('id'), $request->get('meta_key'));
//
//    return response()->json($facilityMeta, 200);
//  }

  /**
   * facilitiesテーブルの名前＆施設タイプと
   * 施設IDとmeta_keyに紐づくfacility_metaテーブルのレコードの
   * 全件を施設IDによって取得するメソッドです。
   *
   * @param Request $request リクエスト
   * @return JsonResponse
   */
  public function getFacilityMetaRecords(Request $request): JsonResponse {
    $facilityMeta = $this->readFacilityMetaService->getFacilityMetaRecords((int)$request->get('id'));

    return response()->json($facilityMeta, 200);
  }

  /**
   * facilitiesテーブルの名前＆施設タイプと
   * 施設IDとmeta_keyに紐づくfacility_metaテーブルのレコードの
   * 全件を施設タイプによって取得するメソッドです。
   *
   * @param Request $request リクエスト
   * @return JsonResponse
   */
  public function getFacilityMetaRecordsByType(Request $request): JsonResponse {
    $facilityMeta = $this->readFacilityMetaService->getFacilityMetaRecordsByType((int)$request->get('type'));

    return response()->json($facilityMeta, 200);
  }
}
