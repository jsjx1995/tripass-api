<?php

namespace App;

use App\Repository\UserMetaRepositoryInterface;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class UserMetaRepository
 *
 * user_metaテーブルの操作を行う具象クラスです。
 *
 * @Author: Akio Inoue
 * @package App\Repository
 */
class UserMetaRepository implements UserMetaRepositoryInterface {
  /**
   * ユーザーIDとmeta_keyに紐づくht_user_metaテーブルのレコードを
   * 全件取得するメソッドです。
   *
   * @param int $id ユーザーID
   * @return array
   */
  public function getUserMetaRecords(int $id): array {
    // 取得したいカラム名を入れる？
    return User::findOrFail($id)->userMeta()->get();
  }
//
//  /**
//   * 施設オーナーとして
//   * usersテーブルとuser_metaテーブルに
//   * 同時に複数件レコードを追加するためのメソッドです。
//   *
//   * 基本的に管理画面から登録するため、
//   * 複数の施設情報が一括で登録される想定です。
//   *
//   * @param array $saveData 登録データ
//   */
//  public function createOwner(array $saveData) {
//    $User = new User();
//    $userData = $saveData[User::CLIENT_DTO_KEY];
//    $User->id = $userData['id'];//代理店の登録処理ではidを指定する
//    $this->setSaveUserData($userData, $User);
//
//    $registerMetaData = $this->setSaveUserMetaData($saveData);
//
//    //途中で登録が失敗した場合はロールバックします。
//    DB::transaction(function () use ($User, $registerMetaData) {
//      $User->save();
//      $User->userMeta()->createMany($registerMetaData);
//    });
//
//    return true;
//  }

  /**
   * ユーザーとして
   * usersテーブルとuser_metaテーブルに
   * 同時に複数件レコードを追加するためのメソッドです。
   *
   * 基本的に管理画面から登録するため、
   * 複数の施設情報が一括で登録される想定です。
   *
   * @param array $saveData 登録データ
   * @return bool
   * @throws \Throwable
   */
  public function createUser(array $saveData) {
    $User = new User();
    $userData = $saveData[User::CLIENT_DTO_KEY];
    $this->setSaveUserData($userData, $User);

    $registerMetaData = $this->setSaveUserMetaData($saveData);

    //途中で登録が失敗した場合はロールバックします。
    DB::transaction(function () use ($User, $registerMetaData) {
      $User->save();
      $User->userMeta()->createMany($registerMetaData);
    });

    return true;
  }

  /**
   * user_metaの各レコードの値を配列化した保存情報で上書きします。
   *
   * @param array $saveData
   * @return bool
   * @throws \Throwable
   */
  public function updateUserMetaRecords(array $saveData) {

    $id = $saveData['user_id'];

    $registerMetaData = $this->setSaveUserMetaData($saveData);

    //途中で登録が失敗した場合はロールバックします
    DB::transaction(function () use ($id, $registerMetaData) {
      $count = count($registerMetaData);
      for ($i = 0; $i < $count; $i++) {
        User::findOrFail($id)->userMeta()->where('meta_key', $registerMetaData[$i]['meta_key'])->update(['meta_value' => $registerMetaData[$i]['meta_value']]);
      }
    });

    return true;
  }

  /**
   * user_metaに保存する情報を配列に格納して返却します。
   *
   * @param array $saveData 登録データ
   * @return array 保存するユーザーの詳細情報
   */
  private function setSaveUserMetaData(array $saveData): array {
    $registerMetaData = [];
    $metaData = $saveData[UserMeta::CLIENT_DTO_KEY];
    foreach ($metaData as $key => $value) {
      $registerMetaData[] = ['meta_key' => $key, 'meta_value' => $value];
    }

    return $registerMetaData;
  }

  /**
   * Userのインスタンスに保存する情報をセットして返却します。
   *
   * @param $userData 登録データ
   * @param User $User Userのインスタンス
   * @return void 登録情報がセットされたUserのインスタンス
   */
  private function setSaveUserData($userData, User $User): void {
    $User->user_login = $userData['user_login'];
    $User->user_email = $userData['user_email'];
    $User->user_display_name = $userData['display_name'];
  }
}