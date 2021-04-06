<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * List all news
     */
    public function index(Request $request)
    {
        //reading news from json file
        $dummyNews = json_decode(File::get(database_path() . "/seeders/json/DummyNews.json"), true);
        $migratedNews = $this->migrateNews($dummyNews);

        if ($request->has('sort'))
            $migratedNews = $migratedNews->sortBy($request->input('sort'));

        return view('landing-news', ['news' => $migratedNews]);
    }

    /**
     * Migrate different sources
     * @param Array $news
     * @return Collection $news
     */
    private function migrateNews($news)
    {
        $allNews = collect();
        $sources = array_keys($news);

        foreach ($sources as $source) {
            $lastNews = $news[$source]['latestnews'];

            foreach ($lastNews as $key => $value)
                $lastNews[$key]['source'] = $source;

            $allNews->push(...$lastNews);
        }

        return collect($allNews)->map(function ($item) {
            //convert sub-array to object
            return (object) $item;
        });
    }
}
