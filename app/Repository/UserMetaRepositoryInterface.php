<?php
/**
 * Created by PhpStorm.
 * User: Akio
 * Date: 2019-2-21
 * Time: 22:10
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
 * @Auther: Akio Inoue
 * @package App\Repository
 */
interface UserMetaRepositoryInterface {
  /**
   * ユーザーIDとmeta_keyに紐づくuser_metaテーブルのレコードを
   * 全件取得するメソッドです。
   *
   * @param int $id ユーザーID
   * @return array
   */
  public function getUserMetaRecords(int $id);

//  /**
//   * 施設オーナーとして
//   * usersテーブルとuser_metaテーブルに
//   * 同時に複数件レコードを追加するためのメソッドです。
//   *
//   * 基本的に管理画面から事務局が登録を行うため、
//   * 複数の代理店情報が一括で登録される想定です。
//   *
//   * @param array $saveData 登録データ
//   */
//    public function createOwner(array $saveData);


  /**
   * ユーザー情報として
   * usersテーブルとuser_metaテーブルに
   * 同時に複数件レコードを追加するためのメソッドです。
   *
   * @param array $saveData 登録データ
   */
  public function createUser(array $saveData);

  public function updateUserMetaRecords(array $saveData);
}
