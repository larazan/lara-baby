<?php

namespace Database\Seeders;

use App\Models\Namelist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

class NamelistCewekUni extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [

            [
                'full_name' => 'Talita Hasna Halimah',
                'meaning' => 'Gadis Cantik yg Sabar dan Tawakal.',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Thafana Nisa Kamila',
                'meaning' => 'Wanita baik hati yang sempurna',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Tamima Anisatul Maliha',
                'meaning' => 'Perempuan sempurna yg ramah dan manis.',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Shafira Nurul Husna',
                'meaning' => 'Perempuan yg memiliki kulit kekuning-kuningan dan memancarkan cahaya yg baik.',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Sarah Lutfiya Jamilah',
                'meaning' => 'Wanita yang cantik, pembereani dan bersemangat',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Shanum Diya Syakira',
                'meaning' => 'Wanita yang diberkahi Tuhan dan selalu bersyukur dengan penuh sukacita',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Mazaya Hikmah Nafisah',
                'meaning' => 'Perempuan istimewa yg bijak dan berharga.',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Mahreen Shafana Almahyra',
                'meaning' => 'Perempuan cerdas yang menghiasi hidupnya dengan kejujujuran',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Malika Nufa Aziza',
                'meaning' => 'Ratu yang paling cantik dan mulia',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Labiqa Kabsya Abidah',
                'meaning' => 'Pemimpin yang berani dan selalu bekerja keras',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Lulu Hilyah Adzkiya',
                'meaning' => 'Perhiasan, mutiara hati yang pandai',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Mia Lily',
                'meaning' => 'lilin kecil',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Megan Skye',
                'meaning' => 'langit yang biru',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Melody Faith',
                'meaning' => 'iman',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Madison Hope',
                'meaning' => 'harapan',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Matilda Pearl',
                'meaning' => 'Kombinasi yang penuh keanggunan.',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Marley Belle',
                'meaning' => 'indah',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Molly Grace',
                'meaning' => 'anugerah Tuhan',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Qafiya Nurul Jannah',
                'meaning' => 'Perempuan yg pandai menghormati orang lain dan menjadi ahli surga.',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Qamira Nur Syifa',
                'meaning' => 'Wanita dengan hati yang bersih, penuh dengan cahaya penyembuhan',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Rasahana Shafwa Ruqayah',
                'meaning' => 'Wanita yang tenang dan tulus dalam cinta',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Rana Aqila Humaira',
                'meaning' => 'Wanita cantik dan sosok mengagumkan yang cerdas',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Utsratun Nisa Aliah',
                'meaning' => 'Perempuan yang menjadi panutan sekaligus tinggi martabatnya',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Ulya Hana Mahdyah',
                'meaning' => 'bunga cantik yg utama dan merupakan hidayah dari Allah.',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Nabila Tsaniya Akbari',
                'meaning' => 'Perempuan cerdik yg akan mendapat pujian agung/mulia.Nasyama Rania KhadijahPerempuan yang baik, menawan / menarik perhatian dan kuat',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Numa Rayna Kamaliya',
                'meaning' => 'Perempuan yang menjadi pemimpin dengan kecantikan yang sempurna',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],
            [
                'full_name' => 'Nada Farah Maulida',
                'meaning' => 'Perempuan yg murah hati serta dilahirkan dalam kesenangan.',
                'gender_id' => 2,
                'locale' => 'id',
                'status' => 'active',
            ],


        ];

        Namelist::insert($data);
    }
}
