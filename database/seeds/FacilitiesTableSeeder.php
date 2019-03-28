<?php

use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder {
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run() {
    DB::table('facilities')->insert([
                                      [
                                        'facility_name' => '株式会社オークン',
                                        'facility_bio' => '株式会社オークンです。株式会社オークンです。株式会社オークンです。株式会社オークンです。株式会社オークンです。',
                                        'facility_type' => 2,
                                        'facility_address' => '大阪府大阪市中央区 高麗橋4-5-2 高麗橋 ウエストビル6F',
                                        'facility_lat' => 34.690185,
                                        'facility_lng' => 135.498496,
                                        'facility_phone' => '06-6949-9277',
                                        'facility_fax' => '06-6949-9277',
                                        'facility_email' => 'a.inoue@o-kun.com',
                                        'facility_web_url' => 'https://o-kun.com',
                                        'facility_price_adult' => 2000,
                                        'facility_discounted_price_adult' => 1000,
                                        'facility_price_child' => 1500,
                                        'facility_discounted_price_child' => 750,
                                        'facility_toilet' => 1,
                                        'facility_signLanguage' => 0,
                                        'facility_elevator' => 1,
                                        'facility_slope' => 1,
                                        'facility_wheelchair' => 1,
                                        'facility_parking' => 1,
                                      ],
                                      [
                                        'facility_name' => '淀屋橋',
                                        'facility_bio' => '大阪メトロの御堂筋線の駅です。大阪メトロの御堂筋線の駅です。大阪メトロの御堂筋線の駅です。',
                                        'facility_type' => 1,
                                        'facility_address' => '大阪府大阪市中央区北浜３丁目１−２５',
                                        'facility_lat' => 34.692802,
                                        'facility_lng' => 135.501404,
                                        'facility_phone' => '06-0000-0000',
                                        'facility_fax' => '06-0000-0000',
                                        'facility_email' => 'yodoyabashi@osaka.com',
                                        'facility_web_url' => 'https://yodoyabashi.com',
                                        'facility_price_adult' => 2000,
                                        'facility_discounted_price_adult' => 1000,
                                        'facility_price_child' => 1500,
                                        'facility_discounted_price_child' => 750,
                                        'facility_toilet' => 1,
                                        'facility_signLanguage' => 0,
                                        'facility_elevator' => 1,
                                        'facility_slope' => 0,
                                        'facility_wheelchair' => 1,
                                        'facility_parking' => 1,
                                      ],
                                      [
                                        'facility_name' => '大阪駅',
                                        'facility_bio' => '大阪の中枢を担う駅です。大阪駅以外の駅は全て梅田と名前がつく。大阪の中枢を担う駅です。大阪駅以外の駅は全て梅田と名前がつく。',
                                        'facility_type' => 1,
                                        'facility_address' => '大阪府大阪市北区梅田３丁目１−１',
                                        'facility_lat' => 34.702564,
                                        'facility_lng' => 135.495757,
                                        'facility_phone' => '06-1111-1111',
                                        'facility_fax' => '06-1111-1111',
                                        'facility_email' => 'osaka@umeda.com',
                                        'facility_web_url' => 'https://osaka.co.jp',
                                        'facility_price_adult' => 2000,
                                        'facility_discounted_price_adult' => 1000,
                                        'facility_price_child' => 1500,
                                        'facility_discounted_price_child' => 750,
                                        'facility_toilet' => 1,
                                        'facility_signLanguage' => 1,
                                        'facility_elevator' => 0,
                                        'facility_slope' => 0,
                                        'facility_wheelchair' => 0,
                                        'facility_parking' => 1,
                                      ],
                                    ]);
//    factory(App\Facility::class, 30)->create();
  }
}
