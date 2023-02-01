<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdminUser;
use App\Models\Game;
use App\Models\GameScore;
use App\Models\GameVersion;
use App\Models\Status;
use App\Models\User;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        AdminUser::factory()->create([
            'username' => 'admin1',
            'password' => '$2y$10$EJb6mlJdJtqFcQrFYBwASuRtF86jf.DWG2jVgnxByxIOa2rTrmYDG'
        ]);

        AdminUser::factory()->create([
            'username' => 'admin2',
            'password' => '$2y$10$A4WlAy7FtrS3ssXSj06yv.s1zE9cxc0sBhfj66Uab.aVa85Gu369G'
        ]);

        Status::factory()->create([
            "status" => "Active",
        ]);
        Status::factory()->create([
            "status" => "You have been blocked by an administrator",
        ]);
        Status::factory()->create([
            "status" => "You have been blocked for spamming",
        ]);
        Status::factory()->create([
            "status" => "You have been blocked for cheating",
        ]);

        User::factory()->create([
            "username" => 'player1',
            "password" => '$2y$10$EJb6mlJdJtqFcQrFYBwASuRtF86jf.DWG2jVgnxByxIOa2rTrmYDG',
        ]);
        User::factory()->create([
            "username" => 'player2',
            "password" => '$2y$10$A4WlAy7FtrS3ssXSj06yv.s1zE9cxc0sBhfj66Uab.aVa85Gu369G',
        ]);
        User::factory()->create([
            "username" => 'dev1',
            "password" => '$2y$10$T8MkSd9MmwxBcXQoAkXRzOwm7eozwzzmz..mYjXDO4dAjf5A5dOXG',
        ]);
        User::factory()->create([
            "username" => 'dev2',
            "password" => '$2y$10$9MrS8sHRLaQvmZf7DIov3OO1cZMjFZdjzGv8/hVm2KnuJhjOs6uV2',
        ]);

        Game::factory()->create([
            "title" => "Demo Game 1",
            "description" => "This is demo game 1",
            "slug" => "demo-game-1",
            "user_id" => "3",
            "deleted" => 0
        ]);
        Game::factory()->create([
            "title" => "Demo Game 2",
            "description" => "This is demo game 2",
            "slug" => "demo-game-2",
            "user_id" => "4",
            "deleted" => 1
        ]);

        GameVersion::factory()->create([
            "game_id" => "1",
            "path" => "demo-game-1-v1/"
        ]);
        GameVersion::factory()->create([
            "game_id" => "1",
            "path" => "demo-game-1-v2/"
        ]);
        GameVersion::factory()->create([
            "game_id" => "2",
            "path" => "demo-game-2-v1/"
        ]);

        GameScore::factory()->create([
            "user_id" => "1",
            "gameversion_id" => "1",
            "score" => 10
        ]);
        GameScore::factory()->create([
            "user_id" => "1",
            "gameversion_id" => "1",
            "score" => 15
        ]);
        GameScore::factory()->create([
            "user_id" => "1",
            "gameversion_id" => "2",
            "score" => 12
        ]);
        GameScore::factory()->create([
            "user_id" => "2",
            "gameversion_id" => "2",
            "score" => 20
        ]);
        GameScore::factory()->create([
            "user_id" => "2",
            "gameversion_id" => "3",
            "score" => 30
        ]);
        GameScore::factory()->create([
            "user_id" => "3",
            "gameversion_id" => "2",
            "score" => 1000
        ]);
        GameScore::factory()->create([
            "user_id" => "3",
            "gameversion_id" => "2",
            "score" => -300
        ]);
        GameScore::factory()->create([
            "user_id" => "4",
            "gameversion_id" => "2",
            "score" => 5
        ]);
        GameScore::factory()->create([
            "user_id" => "4",
            "gameversion_id" => "3",
            "score" => 200
        ]);

    }
}
