<?php

namespace Database\Seeders;

use App\Enums\CategoryType;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoriesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();
            DB::statement("SET foreign_key_checks=0");
            DB::table('categories')->truncate();
            
            Category::insert([
                // category talent
                [
                    'name' => '女性タレント',
                    'type' => CategoryType::TALENT->value,
                    'icon' => 'icon-1.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '男性タレント',
                    'type' => CategoryType::TALENT->value,
                    'icon' => 'icon-2.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '女優',
                    'type' => CategoryType::TALENT->value,
                    'icon' => 'icon-3.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '俳優',
                    'type' => CategoryType::TALENT->value,
                    'icon' => 'icon-4.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'グラビア',
                    'type' => CategoryType::TALENT->value,
                    'icon' => 'icon-5.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'モデル',
                    'type' => CategoryType::TALENT->value,
                    'icon' => 'icon-6.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'お笑い',
                    'type' => CategoryType::TALENT->value,
                    'icon' => 'icon-7.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '文化人',
                    'type' => CategoryType::TALENT->value,
                    'icon' => 'icon-8.png',
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                // category personal
                [
                    'name' => '誕生日',
                    'type' => CategoryType::PERSONAL->value,
                    'icon' => 'cake.svg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '結婚式',
                    'type' => CategoryType::PERSONAL->value,
                    'icon' => 'ring.svg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '応援',
                    'type' => CategoryType::PERSONAL->value,
                    'icon' => 'volume.svg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '感謝',
                    'type' => CategoryType::PERSONAL->value,
                    'icon' => 'gift.svg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '記念日',
                    'type' => CategoryType::PERSONAL->value,
                    'icon' => 'calender.svg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'お祝い',
                    'type' => CategoryType::PERSONAL->value,
                    'icon' => 'flower.svg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'イベント',
                    'type' => CategoryType::PERSONAL->value,
                    'icon' => 'flower1.svg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'その他',
                    'type' => CategoryType::PERSONAL->value,
                    'icon' => 'dots.svg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                // category commerce
                [
                    'name' => '広告',
                    'type' => CategoryType::COMMERCIAL->value,
                    'icon' => 'chatops.svg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => '採用活動',
                    'type' => CategoryType::COMMERCIAL->value,
                    'icon' => 'security.svg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'イベント',
                    'type' => CategoryType::COMMERCIAL->value,
                    'icon' => 'flower1.svg',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'その他',
                    'type' => CategoryType::COMMERCIAL->value,
                    'icon' => 'dots.svg',
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]);

            DB::statement("SET foreign_key_checks=1");
            DB::commit();
        } catch (\Exception $exception) {
            Log::error('Error db seeder : ' . $exception->getMessage());
            DB::rollBack();
        }
    }
}
