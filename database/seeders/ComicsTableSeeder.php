<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class ComicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = config('comics');
        
        foreach($comics as $comic) {
            $artists_list = '';
            $writers_list = '';

            $newComic = new Comic();
            $newComic->title = $comic['title'];
            $newComic->description = $comic['description'];
            $newComic->thumb = $comic['thumb'];
            $newComic->price = ltrim($comic['price'], '$');
            $newComic->series = $comic['series'];
            $newComic->sale_date = $comic['sale_date'];
            $newComic->type = $comic['type'];

            foreach($comic['artists'] as $key=>$artist) {
                if($key < count($comic['artists']) - 1) {
                    $artists_list .= $artist . ', ';
                } else {
                    $artists_list .= $artist;
                }
            }

            $newComic->artists = $artists_list;

            foreach($comic['writers'] as $key=>$writer) {
                if($key < count($comic['writers']) - 1) {
                    $writers_list .= $writer . ', ';
                } else {
                    $writers_list .= $writer;
                }
            }

            $newComic->writers = $writers_list;

            $newComic->save();
        }
    }
}
