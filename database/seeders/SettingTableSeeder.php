<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('setings')->insert([
           
            'website_name'=>'Auction system',
            'short_desc'=>'Auction system',
            'address'=>'Dhaka dhanmondi',
            'email'=>'depo.support@gmail.com',
            'phone'=>'01600000000',
            'footer'=>'Depu',
            'facebook_url'=>'https://facebook.com/',
            'twitter_url'=>'https://facebook.com/',
            'linkedin_url'=>'https://facebook.com/',
            'skype_link'=>'https://facebook.com/',
            'instagram_link'=>'https://facebook.com/',
            ]);

         
    }
}
