<?php

namespace App;

use App\User;
use App\Repository\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class UserRepository
 *
 * Userテーブルの操作を行う具象クラスです。
 *
 * @Author: Akio
 * @package App\Repository
 */
class UserRepository implements UserRepositoryInterface {
  /**
   * ユーザーIDに紐づくレコードを1件取得するメソッドです。
   *
   * @param int $id ユーザーID
   * @return array
   */
  public function find(int $id) {
    return User::findOrFail($id)->toArray();
  }

  /**
   * ht_usersテーブルから指定したEmailに該当したレコードを
   * 取得するメソッドです。
   *
   * @param string $userEmail ユーザーのアドレス
   * @return array
   */
  public function whereUserEmail(string $userEmail): array {
    return User::whereUserEmail($userEmail)->get()->toArray();
  }
}