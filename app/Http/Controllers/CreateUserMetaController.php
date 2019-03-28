<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CreateUserMetaService;
use Illuminate\Support\Facades\Log;

class CreateUserMetaController extends Controller {
  private $UserMetaCreateService;

  /**
   * CreateUserMetaController constructor.
   *
   * @param CreateUserMetaService $UserMetaCreateService
   */
  public function __construct(CreateUserMetaService $UserMetaCreateService) {

    $this->UserMetaCreateService = $UserMetaCreateService;

  }

  /**
   * 施設ユーザー情報として
   * usersテーブルとuser_metaテーブルに
   * 同時に複数件レコードを追加するためのメソッドです。
   *
   * @param Request $request
   * @return JsonResponse
   */
  public function createRecords(Request $request): JsonResponse {

    Log::info($request);
    $result = $this->UserMetaCreateService->createUser($request->post());

    return response()->json($result, 200);
  }
  //
}
