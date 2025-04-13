<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'cuoriContraddittori'], 
            ['name' => 'sfideDaSuperare'],
            ['name' => 'speranza'],
            ['name' => 'dolcezza'],
            ['name' => 'confusione'],
            ['name' => 'segreti'],
            ['name' => 'emozioniNonEspresse'],
            ['name' => 'crescita'],
            ['name' => 'destino'],
            ['name' => 'primoBattitoDiCuore'],
             ];

        foreach($tags as $tag){
            Tag::create([
                'name'=>$tag['name']
            ]);
        }
    }
}
