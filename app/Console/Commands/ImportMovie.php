<?php

namespace App\Console\Commands;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\MovieGenre;
use App\Models\MovieImage;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class ImportMovie extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-movie';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $currentPage = 1;
        $maxpage = 255;
        for ($i = $currentPage; $i <= $maxpage; $i++) {
            $this->warn('Current Page:' . $i);
            $response = Http::get('https://moviesapi.ir/api/v1/movies?page=' . $i);
            $items = $response->json();
            $movies = $items['data'];

            foreach ($movies as $movie) {
                $poster = isset($movie['poster']) ? $this->SaveImage($movie['poster'], $movie['title'], 'poster') : null;

                $createMovie = Movie::create([
                    'title' => $movie['title'],
                    'slug' => Str::slug($movie['title']),
                    'year' => $movie['year'],
                    'country' => $movie['country'],
                    'imdb_rating' => $movie['imdb_rating'],
                    'poster' => $poster,

                ]);
                if (isset($movie['genres'])) {
                    foreach ($movie['genres'] as $genre) {
                        $createGenre = Genre::firstOrCreate([
                            'name' => $genre,
                            'slug' => Str::slug($genre),

                        ]);
                        MovieGenre::create([
                            'movie_id' => $createMovie->id,
                            'genre_id' => $createGenre->id,

                        ]);
                    }
                    if (isset($movie['images'])) {
                        foreach ($movie['images'] as $image) {
                            $imagePath = $this->SaveImage($image, $movie['title'], Uuid::uuid4()->ToString());
                            MovieImage::create([
                                'movie_id' => $createMovie->id,
                                'image' => $imagePath,

                            ]);
                        }
                    }
                    $this->info("Movie:" . $movie['title'] . "Saved");

                }
            }

        }



    }
    public function SaveImage($image, $title, $name)
    {

        $image = file_get_contents($image);
        $path = Str::slug($title) . '/' . $name . '.jpg';
        Storage::put('public/' . $path, $image);
        return $path;



    }
}