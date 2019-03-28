<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-02-20
 * Time: 12:02
 */
namespace App\Http\Controllers;

use App\Services\ReadUserMetaService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class UserSelectController
 *
 * user_metaテーブルの情報を取得するためのコントローラです。
 *
 * @Author: Akio
 * @package App\Http\Controllers
 */
class ReadUserMetaController extends Controller {
  private $readUserMetaService;

  /**
   * ReadUserMetaController constructor.
   * コンストラクタです。
   *
   * @param ReadUserMetaService $readUserMetaService
   */
  public function __construct(ReadUserMetaService $readUserMetaService) {

    $this->readUserMetaService = $readUserMetaService;

  }

  /**
   * id指定でuser_metaのレコードを1件取得するメソッドです。
   *
   * @param Request $request リクエスト
   * @return JsonResponse
   */
  public function findUserMetaRecord(Request $request): JsonResponse {

    $userMeta = $this->readUserMetaService->findUserMetaRecord((int)$request->get('id'), $request->get('$key'));

    return response()->json($userMeta, 200);
  }

  /**
   * user_metaのレコードを複数件取得するメソッドです。
   *
   * @param Request $request リクエスト
   * @return JsonResponse
   */
  public function findUserMetaRecords(Request $request): JsonResponse {
    $userMeta = $this->readUserMetaService->findUserMetaRecords($request->get('id'));

    return response()->json($userMeta, 200);
  }
}
