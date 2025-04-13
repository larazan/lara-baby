<?php

namespace Database\Seeders;

use App\Models\Faq;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'question' => 'What is The Million Facts?',
                'answer' => 'The Million Facts is a dedicated platform that curates and shares a plenty of interesting and random facts. Our goal is to provide an endless supply of knowledge that can entertain, educate, and spark curiosity.',
                'order_position' => 1,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Where can I find these facts?',
                'answer' => 'You can find our facts on our website, social media platforms, and through our newsletters. We regularly update our content to keep it fresh and engaging.',
                'order_position' => 2,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Can I submit my own facts to The Million Facts?',
                'answer' => 'Yes! We encourage our community to contribute. If you have an interesting or random fact, please submit it through our submission form on the website.',
                'order_position' => 3,
                'status' => 'inactive',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Are the facts verified for accuracy?',
                'answer' => 'Yes, we strive to provide accurate and reliable information. Our team conducts thorough research to verify the facts before sharing them with our audience.',
                'order_position' => 4,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'How often do you update your content?',
                'answer' => 'We update our content regularly, with new facts added daily. Be sure to check back often for the latest interesting tidbits!',
                'order_position' => 5,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Can I use the facts for educational purposes?',
                'answer' => 'Absolutely! Our facts can be used for educational purposes, presentations, or simply to impress your friends. Just be sure to credit The Million Facts as your source.',
                'order_position' => 6,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Is there a subscription fee to access the facts?',
                'answer' => 'No, The Million Facts is completely free to access. We believe in sharing knowledge with everyone without any barriers.',
                'order_position' => 7,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Do you have a mobile app?',
                'answer' => 'Currently, we do not have a mobile app, but our website is mobile-friendly and can be easily accessed from your smartphone or tablet.',
                'order_position' => 8,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'Can I follow you on social media?',
                'answer' => 'Yes! We are active on various social media platforms including Facebook, Twitter, and Instagram. Follow us to get daily doses of fascinating facts right in your feed!',
                'order_position' => 9,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
            [
                'question' => 'How can I stay updated with the latest facts?',
                'answer' => 'You can subscribe to our newsletter on our website to receive the latest facts directly in your inbox. Additionally, following us on social media will keep you in the loop about our newest content.',
                'order_position' => 10,
                'status' => 'active',
                'created_at' => Carbon::now(),
            ],
        ];

        Faq::insert($data);
    }
}
