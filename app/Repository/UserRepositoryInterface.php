<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-2-19
 * Time: 17:00
 */
declare(strict_types=1);
namespace App\Repository;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class UserRepository
 *
 * usersテーブルの操作を行うインターフェースです。
 *
 * @Auther: Akio
 * @package App\Repository
 */
interface UserRepositoryInterface {
  /**
   * ユーザーIDに紐づくレコードを1件取得するメソッドです。
   *
   * @param int $id ユーザーID
   * @return array
   */
  public function find(int $id);

  /**
   * usersテーブルから指定したEmailに該当したレコードを
   * 取得するメソッドです。
   *
   * @param string $userEmail ユーザーのアドレス
   * @return array
   */
  public function whereUserEmail(string $userEmail): array;
}
