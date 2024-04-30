<?php

namespace App\Console\Commands;

use App\Models\Note;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class RedisTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:go';

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
        $res = 0;
        $att = 50;

        if (Cache::has('notes')) {
            dd(true);
        }
        dd(false);

        for ($i = 0; $i < $att; $i += 1) {
            $before = microtime(true);
            // Note::all();
            Cache::rememberForever('notes', function () {
                return Note::query()->where('note', 'like', 'a')->get();
            });
            $after = microtime(true);
            $res += $after - $before;
            sleep(0.5);
            echo $i . '...';
        }
        dd($res / $att);
    }
}
