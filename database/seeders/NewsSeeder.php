<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Category;
use App\Models\News;
use Illuminate\Database\Seeder;

final class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::pluck('id')->toArray();
        $admins = Admin::pluck('id')->toArray();

        $news = [
            [
                'id' => snowflake(),
                'title_ar' => 'المستقبل من التكنولوجيا',
                'title_en' => 'The Future of AI in Modern Computing',
                'content_ar' => 'تتناول هذه المقالة كيف يمكن للذكاء الاصطناعي أن يغير طريقة عملنا وتفاعلنا مع التكنولوجيا.',
                'content_en' => 'This article discusses how AI can change the way we work and interact with technology.',
                'category_id' => $categories[array_rand($categories)],
                'admin_id' => $admins[array_rand($admins)],
                'published_at' => now(),
                'created_at' => now(),
                'status' => 'published',
            ],
            [
                'id' => snowflake(),
                'title_ar' => 'أهم أحداث كرة القدم في 2025',
                'title_en' => 'Top Football Events of 2025',
                'content_ar' => 'تستعرض هذه المقالة أبرز الأحداث الرياضية في عالم كرة القدم خلال عام 2025.',
                'content_en' => 'This article reviews the most significant sports events in the world of football during 2025.',
                'category_id' => $categories[array_rand($categories)],
                'admin_id' => $admins[array_rand($admins)],
                'published_at' => now(),
                'created_at' => now(),
                'status' => 'published',
            ],
            [
                'id' => snowflake(),
                'title_ar' => 'الانتخابات الرئاسية وتأثيرها على السياسة العالمية',
                'title_en' => 'Presidential Elections and Their Impact on Global Politics',
                'content_ar' => 'تحلل هذه المقالة كيف تؤثر الانتخابات الرئاسية على السياسة العالمية والعلاقات الدولية.',
                'content_en' => 'This article analyzes how presidential elections affect global politics and international relations.',
                'category_id' => $categories[array_rand($categories)],
                'admin_id' => $admins[array_rand($admins)],
                'published_at' => now(),
                'created_at' => now(),
                'status' => 'published',
            ],
            [
                'id' => snowflake(),
                'title_ar' => 'الاتجاهات الاقتصادية العالمية',
                'title_en' => 'Global Economic Trends',
                'content_ar' => 'تتناول هذه المقالة أهم الاتجاهات الاقتصادية في العالم وكيف تؤثر على حياتنا اليومية.',
                'content_en' => 'This article discusses the major economic trends in the world and how they affect our daily lives.',
                'category_id' => $categories[array_rand($categories)],
                'admin_id' => $admins[array_rand($admins)],
                'published_at' => now(),
                'created_at' => now(),
                'status' => 'not_published',
            ],

        ];

        News::insert($news);
    }
}
