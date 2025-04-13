<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $data = [
            [
                'key' => 'title',
                'value' => 'Million Fun and Fact'
            ],
            [
                'key' => 'description',
                'value' => 'Million Fun and Fact'
            ],
            [
                'key' => 'meta_title',
                'value' => 'lorem ipsum dolor sit amet'
            ],
            [
                'key' => 'meta_keyword',
                'value' => 'bla bla bla bla'
            ],
            [
                'key' => 'meta_description',
                'value' => 'lorem ipsum dolor sit amet'
            ],
            [
                'key' => 'address',
                'value' => 'lorem ipsum dolor sit amet'
            ],
            [
                'key' => 'phone',
                'value' => '08885885544'
            ],
            [
                'key' => 'email',
                'value' => 'admin@mail.com'
            ],
            [
                'key' => 'twitter',
                'value' => 'https://x.com/_colorblissart'
            ],
            [
                'key' => 'facebook',
                'value' => 'https://www.facebook.com/colorblissart/'
            ],
            [
                'key' => 'instagram',
                'value' => 'https://www.instagram.com/colorbliss.art/'
            ],
            [
                'key' => 'pinterest',
                'value' => 'https://id.pinterest.com/getcolorbliss/'
            ],
            [
                'key' => 'about_us',
                'value' => '<p><strong>Return Policy</strong></p><p>Are you not completely satisfied with your purchase? You have the right to return the product(s) you bought at PLNTS.com within 14 days of receiving them. We will give you a full refund of the purchased item(s). However, perishable products, such as plants, are exempt from this right. Unfortunately, this means that it is not possible to return plants.</p><p>&nbsp;</p><p>Did your plant arrive in bad condition or is there something else wrong with your new green roommate? Please use the yellow support widget at the bottom left on our website to contact our customer service. We will do everything we can to make both you and your plant happy again!</p><p>Please download the following return form, fill it in and send it back with the items you would like to return.</p><h3>A few more things:</h3><p>&nbsp;</p><p>As a customer, you are responsible for the return shipping costs. As soon as we receive your return package, we will start processing your refund request. Please note that you will not be reimbursed for the original shipping costs. Any refunds made by us will be issued back to the payment method that you used to place your order.</p><p>&nbsp;</p><p>Would you like to exchange a plant pot or another non-perishable product for a different colour or size? Please send the item(s) back to us and place a new order. We will refund the money for the returned item (but not the transport costs) as soon as possible.</p><p>&nbsp;</p><p>The items you wish to return are your responsibility until we receive them. If possible, re-use the original packaging for returning your order and make sure all items are well packed. We cannot compensate for products that were lost or damaged during transportation.</p>'
            ],
            [
                'key' => 'terms_and_conditions',
                'value' => '<p><strong>Return Policy</strong></p><p>Are you not completely satisfied with your purchase? You have the right to return the product(s) you bought at PLNTS.com within 14 days of receiving them. We will give you a full refund of the purchased item(s). However, perishable products, such as plants, are exempt from this right. Unfortunately, this means that it is not possible to return plants.</p><p>&nbsp;</p><p>Did your plant arrive in bad condition or is there something else wrong with your new green roommate? Please use the yellow support widget at the bottom left on our website to contact our customer service. We will do everything we can to make both you and your plant happy again!</p><p>Please download the following return form, fill it in and send it back with the items you would like to return.</p><h3>A few more things:</h3><p>&nbsp;</p><p>As a customer, you are responsible for the return shipping costs. As soon as we receive your return package, we will start processing your refund request. Please note that you will not be reimbursed for the original shipping costs. Any refunds made by us will be issued back to the payment method that you used to place your order.</p><p>&nbsp;</p><p>Would you like to exchange a plant pot or another non-perishable product for a different colour or size? Please send the item(s) back to us and place a new order. We will refund the money for the returned item (but not the transport costs) as soon as possible.</p><p>&nbsp;</p><p>The items you wish to return are your responsibility until we receive them. If possible, re-use the original packaging for returning your order and make sure all items are well packed. We cannot compensate for products that were lost or damaged during transportation.</p>'
            ],
            [
                'key' => 'privacy_policy',
                'value' => '<p><strong>Return Policy</strong></p><p>Are you not completely satisfied with your purchase? You have the right to return the product(s) you bought at PLNTS.com within 14 days of receiving them. We will give you a full refund of the purchased item(s). However, perishable products, such as plants, are exempt from this right. Unfortunately, this means that it is not possible to return plants.</p><p>&nbsp;</p><p>Did your plant arrive in bad condition or is there something else wrong with your new green roommate? Please use the yellow support widget at the bottom left on our website to contact our customer service. We will do everything we can to make both you and your plant happy again!</p><p>Please download the following return form, fill it in and send it back with the items you would like to return.</p><h3>A few more things:</h3><p>&nbsp;</p><p>As a customer, you are responsible for the return shipping costs. As soon as we receive your return package, we will start processing your refund request. Please note that you will not be reimbursed for the original shipping costs. Any refunds made by us will be issued back to the payment method that you used to place your order.</p><p>&nbsp;</p><p>Would you like to exchange a plant pot or another non-perishable product for a different colour or size? Please send the item(s) back to us and place a new order. We will refund the money for the returned item (but not the transport costs) as soon as possible.</p><p>&nbsp;</p><p>The items you wish to return are your responsibility until we receive them. If possible, re-use the original packaging for returning your order and make sure all items are well packed. We cannot compensate for products that were lost or damaged during transportation.</p>'
            ],
        ];

        Setting::insert($data);
    }
}
