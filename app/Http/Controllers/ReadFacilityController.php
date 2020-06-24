<?php

/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-02-20
 * Time: 16:05
 */

namespace App\Http\Controllers;

use App\FacilityBasicinfo;
use App\Services\ReadFacilityService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Class UserSelectController
 *
 * facilityテーブルの情報を取得するためのコントローラです。
 *
 * @Author: Akio
 * @package App\Http\Controllers
 */
class ReadFacilityController extends Controller
{
  private $readFacilityService;

  /**
   * ReadFacilityController constructor.
   * コンストラクタです。
   *
   * @param readFacilityService $readFacilityService
   */
  public function __construct(ReadFacilityService $readFacilityService)
  {

    $this->readFacilityService = $readFacilityService;
  }

  // public function findFacility(Request $request): JsonResponse
  // {
  //   Log::info($request);

  //   $facilityMeta = $this->readFacilityService->findFacility((int) $request->get('id'), $request->get('$key'));

  //   return response()->json($facilityMeta, 200);
  // }

  // /**
  //  * 施設タイプとキーワード検索で指定した位置の緯度経度から施設情報を取得します。
  //  *
  //  * @param Request $request リクエスト
  //  * @return JsonResponse
  //  */
  public function findNearFacilityByFacilityType(Request $request)
  {
    // echo $request->get('type');
    $facilityInfo = $this->readFacilityService->findNearFacilityByFacilityType((string) $request->get('type'), (string) $request->get('lat'), (string) $request->get('lng'));

    return response()->json($facilityInfo, 200);
  }
}
