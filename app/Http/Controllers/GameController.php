<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameVersion;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index() {
        $data = Game::all();
        return view("game.index", ['games' => $data]);
    }
    
    public function show(Game $game) {
        return view("game.show", [
            "game" => $game
        ]);
    }

    public function update(Request $request) {
        $attributes = $request->all();
        
        $attributes["deleted"] = isset($attributes["deleted"]) ? 1 : 0;
        
        Game::where("id", $attributes["id"])
            ->update(["deleted" => $attributes["deleted"]]);
        
        return redirect("/XX_module_c/game/" . $attributes["slug"]);
    }

    public function apiindex(Request $request) {
        if ($request->user()->status_id != 1) {
            return response(["status" => "blocked",
                            "message" => "User blocked",
                            "reason" => $request->user()->status->status
        ], 403);
        };

        $attributes = $request->all();
        $page = isset($attributes["page"]) ? $attributes["page"] : "0";
        $pageSize = isset($attributes["size"]) ? $attributes["size"] : "10";
        $sortBy = isset($attributes["sortBy"]) ? $attributes["sortBy"] : "title";
        $sortDir = isset($attributes["sortDir"]) ? $attributes["sortDir"] : "asc";

        $totalElements = GameVersion::distinct()->count(["game_id"]);
        $skip = $page * $pageSize;
        $pageCount = ceil($totalElements / $pageSize);
        $isLastPage = ($page + 1) * $pageSize >= $totalElements;

        $games = Game::select("games.*")
                    ->join("game_versions", "games.id", "=", "game_versions.game_id")
                    ->distinct("games.id")
                    ->skip($skip)
                    ->take($pageSize)
                    ->get();
        
        $content = [];

        foreach ($games as $game) {
            array_push($content, [
                "slug" => $game["slug"],
                "title" => $game["title"],
                "description" => $game["description"],
                "thumbnail" => "",
                "uploadTimestamp" => "",
                "author" => $game["user"]->username,
                "scoreCount" => ""
            ]);
        }

        $response = [
            "page" => $page,
            "size" => $pageSize,
            "totalElements" => $totalElements,
            "content" => $content


        ];

        return response($response, 200);
    }
}
