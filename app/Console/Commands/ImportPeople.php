<?php

namespace App\Console\Commands;

use App\Models\Award;
use App\Models\KnownFor;
use App\Models\People;
use App\Models\PeopleAward;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImportPeople extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-people';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import people data from external API';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $response = Http::get('https://freetestapi.com/api/v1/actors');
        $peoples = $response->json();

        foreach ($peoples as $people) {
            $imagePath = 'public/' . Str::slug($people['name']) . '/' . $people['name'] . '.jpg';
            $image = Storage::put($imagePath, file_get_contents($people['image']));

            $createPeople = People::create([
                'name' => $people['name'],
                'slug' => Str::slug($people['name']),
                'birth_year' => $people['birth_year'],
                'death_year' => $people['death_year'] ?? null,
                'nationality' => $people['nationality'],
                'biography' => $people['biography'],
                'image' => $imagePath,
            ]);

            if (isset($people['awards'])) {
                foreach ($people['awards'] as $award) {
                    $createAward = Award::firstOrCreate([
                        'name' => $award,
                        'slug' => Str::slug($award),
                    ]);

                    PeopleAward::create([
                        'people_id' => $createPeople->id,
                        'award_id' => $createAward->id,
                    ]);
                }
            }

            if (isset($people['known_for'])) {
                foreach ($people['known_for'] as $knownFor) {
                    KnownFor::create([
                        'people_id' => $createPeople->id,
                        'name' => $knownFor,
                    ]);
                }
            }
        }
    }
}
