<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-02-20
 * Time: 10:49
 */
namespace App\Http\Controllers;

use App\Services\ReadUserService;
use Illuminate\Http\Request;
//use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use PhpParser\JsonDecoder;

/**
 * Class UserSelectController
 *
 * usersテーブルの情報を取得するためのコントローラです。
 *
 * @Author: Akio
 * @package App\Http\Controllers
 */
class ReadUserController extends Controller {
  private $readUserService;

  /**
   * ReadUserController constructor.
   * コンストラクタです。
   *
   * @param ReadUserService $readUserService
   */
  public function __construct(ReadUserService $readUserService) {

    $this->readUserService = $readUserService;

  }

  /**
   * id指定でusersのレコードを1件取得するメソッドです。
   *
   * @param Request $request リクエスト
   * @return JsonResponse
   */

  public function findUserRecord(Request $request): JsonResponse {
    Log::info($request);

    $user = $this->readUserService->findUserRecord((int)$request->get('id'), $request->get('$aaa'));

    return response()->json($user, 200);
  }

  /**
   * ユーザーのメールアドレス指定でusersのレコードを1件取得します。
   *
   * @param Request $request リクエスト
   * @return JsonResponse
   */
  public function whereUserEmail(Request $request): JsonResponse {
    $userMeta = $this->readUserService->whereUserEmail($request->get('user_email'));

    return response()->json($userMeta, 200);
  }
}

