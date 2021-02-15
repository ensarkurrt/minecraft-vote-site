<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servers')->insert([
            'user_id' => 1,
            'name' => 'Sunucu Adı 1',
            'ip' => '123.123.123.324141',
            'image' => 'B474EA91-5205-4F20-83CD-2EAF5C6B5D14.jpeg',
            'slug' => 'server-name',
            'webSiteUrl' => 'server-name',
            'status'=>0,
            'onlinePlayer'=>0,
            'maxPlayer'=>0,
            'rank'=>2,
            'isActive'=>1,
        ]);
        DB::table('servers')->insert([
            'user_id' => 2,
            'name' => 'Sunucu Adı 2',
            'ip' => '192.168.1.221314',
            'image' => 'B474EA91-5205-4F20-83CD-2EAF5C6B5D14.jpeg',
            'slug' => 'server-name',
            'webSiteUrl' => 'server-name',
            'status'=>1,
            'onlinePlayer'=>2,
            'maxPlayer'=>64,
            'rank'=>15,
            'isActive'=>1,
        ]);
        DB::table('servers')->insert([
            'user_id' => 3,
            'name' => 'Sunucu Adı 3',
            'ip' => '123.123.123.1243341',
            'image' => 'B474EA91-5205-4F20-83CD-2EAF5C6B5D14.jpeg',
            'slug' => 'server-name',
            'webSiteUrl' => 'server-name',
            'status'=>1,
            'onlinePlayer'=>12,
            'maxPlayer'=>64,
            'rank'=>3,
            'isActive'=>1,
        ]);
        DB::table('servers')->insert([
            'user_id' => 4,
            'name' => 'Sunucu Adı 4',
            'ip' => '123.123.123.412341',
            'image' => 'B474EA91-5205-4F20-83CD-2EAF5C6B5D14.jpeg',
            'slug' => 'server-name',
            'webSiteUrl' => 'server-name',
            'status'=>1,
            'onlinePlayer'=>18,
            'maxPlayer'=>64,
            'rank'=>17,
            'isActive'=>1,
        ]);
        DB::table('servers')->insert([
            'user_id' => 1,
            'name' => 'Sunucu Adı 5',
            'ip' => '123.123.192.421341',
            'image' => 'B474EA91-5205-4F20-83CD-2EAF5C6B5D14.jpeg',
            'slug' => 'server-name',
            'webSiteUrl' => 'server-name',
            'status'=>0,
            'onlinePlayer'=>10,
            'maxPlayer'=>32,
            'rank'=>10,
            'isActive'=>1,
        ]);
        DB::table('servers')->insert([
            'user_id' => 1,
            'name' => 'Sunucu Adı 1',
            'ip' => '123.123.123.2431234',
            'image' => 'B474EA91-5205-4F20-83CD-2EAF5C6B5D14.jpeg',
            'slug' => 'server-name',
            'webSiteUrl' => 'server-name',
            'status'=>0,
            'onlinePlayer'=>0,
            'maxPlayer'=>0,
            'rank'=>2,
            'isActive'=>1,
        ]);
        DB::table('servers')->insert([
            'user_id' => 2,
            'name' => 'Sunucu Adı 2',
            'ip' => '192.168.1.213412',
            'image' => 'B474EA91-5205-4F20-83CD-2EAF5C6B5D14.jpeg',
            'slug' => 'server-name',
            'webSiteUrl' => 'server-name',
            'status'=>1,
            'onlinePlayer'=>2,
            'maxPlayer'=>64,
            'rank'=>15,
            'isActive'=>1,
        ]);
        DB::table('servers')->insert([
            'user_id' => 3,
            'name' => 'Sunucu Adı 3',
            'ip' => '123.123.123.42341',
            'image' => 'B474EA91-5205-4F20-83CD-2EAF5C6B5D14.jpeg',
            'slug' => 'server-name',
            'webSiteUrl' => 'server-name',
            'status'=>1,
            'onlinePlayer'=>12,
            'maxPlayer'=>64,
            'rank'=>3,
            'isActive'=>1,
        ]);
        DB::table('servers')->insert([
            'user_id' => 4,
            'name' => 'Sunucu Adı 4',
            'ip' => '123.123.123.4314324',
            'image' => 'B474EA91-5205-4F20-83CD-2EAF5C6B5D14.jpeg',
            'slug' => 'server-name',
            'webSiteUrl' => 'server-name',
            'status'=>1,
            'onlinePlayer'=>18,
            'maxPlayer'=>64,
            'rank'=>17,
            'isActive'=>1,
        ]);
        DB::table('servers')->insert([
            'user_id' => 1,
            'name' => 'Sunucu Adı 5',
            'ip' => '123.123.192.1233',
            'image' => 'B474EA91-5205-4F20-83CD-2EAF5C6B5D14.jpeg',
            'slug' => 'server-name',
            'webSiteUrl' => 'server-name',
            'status'=>0,
            'onlinePlayer'=>10,
            'maxPlayer'=>32,
            'rank'=>10,
            'isActive'=>1,
        ]);

    }
}
