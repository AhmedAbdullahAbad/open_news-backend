<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

final class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        $categories = [
            ['id' => snowflake(), 'name_ar' => 'التكنولوجيا', 'name_en' => 'Technology', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['id' => snowflake(), 'name_ar' => 'الرياضة', 'name_en' => 'Sports', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['id' => snowflake(), 'name_ar' => 'الساسة', 'name_en' => 'Politics', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['id' => snowflake(), 'name_ar' => 'الاقتصاد', 'name_en' => 'Economics', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['id' => snowflake(), 'name_ar' => 'الصحة', 'name_en' => 'Health', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['id' => snowflake(), 'name_ar' => 'العلوم', 'name_en' => 'Science', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['id' => snowflake(), 'name_ar' => 'الفن', 'name_en' => 'Art', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['id' => snowflake(), 'name_ar' => 'الثقافة', 'name_en' => 'Culture', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
            ['id' => snowflake(), 'name_ar' => 'السفر', 'name_en' => 'Travel', 'is_active' => true, 'created_at' => $now, 'updated_at' => $now],
        ];

        Category::insert($categories);
    }
}
