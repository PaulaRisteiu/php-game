<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    public function run()
    {
        // Inserăm Hero
        $heroId = DB::table('heroes')->insertGetId([
            'name' => 'Kratos',
            'health' => rand(65, 100),
            'strength' => rand(75, 90),
            'defence' => rand(40, 50),
            'speed' => rand(40, 50),
            'luck' => rand(10, 20) / 100,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Inserăm Skill-uri
        $skillRapidFireId = DB::table('skills')->insertGetId([
            'name' => 'RapidFire',
            'description' => '15% șansă să atace de două ori.',
            'chance' => 0.15,
            'effect_type' => 'double_attack',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $skillMagicArmourId = DB::table('skills')->insertGetId([
            'name' => 'MagicArmour',
            'description' => '15% șansă să reducă daunele la jumătate.',
            'chance' => 0.15,
            'effect_type' => 'reduce_damage',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Legăm Hero de skill-uri
        DB::table('hero_skills')->insert([
            ['hero_id' => $heroId, 'skill_id' => $skillRapidFireId],
            ['hero_id' => $heroId, 'skill_id' => $skillMagicArmourId],
        ]);

        // Inserăm Monster
        DB::table('monsters')->insert([
            'name' => 'Wild Beast',
            'health' => rand(60, 90),
            'strength' => rand(60, 90),
            'defence' => rand(30, 50),
            'speed' => rand(30, 60),
            'luck' => rand(10, 20) / 100,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
