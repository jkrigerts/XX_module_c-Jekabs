@extends('admin.dashboard.layout')

@section('content')
    <h1>Games</h1>
    <div id="search-box">
      <label for="search">Enter title:</label>
      <input id="search" />
    </div>
    <table >
      <thead>
          <tr>
              <th>Title</th>
              <th>Description</th>
              <th>Thumbnail</th>
              <th>Author</th>
              <th>Versions</th>
              <th>Link to Game</th>
          </tr>
      </thead>
      <tbody id="data">
          @foreach ($games as $game)
              <tr>
                  <td>{{ $game['title'] }}</td>
                  <td>{{ $game['description'] }}</td>
                  <td>{{ $game['thumbnail'] }}</td>
                  <td>{{ $game['user']->username }}</td>
                  <td>
                    <ul>
                        @foreach ($game['gameversion'] as $version)
                            <li><em>{{$version["path"]}}</em> created at <em>{{$version["created_at"]}}</em></li> 
                        @endforeach
                    </ul>
                    
                  </td>
                  <td><a href="/XX_module_c/game/{{ $game['slug'] }}">/XX_module_c/game/{{ $game['slug'] }}</a></td>
              </tr> 
          @endforeach 
      </tbody>
  </table>

  <script>

    const allGames = {!! $games !!};

    function filterGames() {
      const search = document.getElementById("search").value;
      const games = allGames.filter(game => game.title.toLowerCase().includes(search.toLowerCase()));

      document.getElementById("data").innerHTML = "";
      const tbody = document.getElementById("data");

      if (games.length == 0) {
        const row = document.createElement("tr");
        const td = document.createElement("td");
        td.textContent = "No games found";
        td.colSpan = 7;
        row.appendChild(td);
        tbody.appendChild(row);
      }

      console.log(games);

      games.forEach(game => {
        const row = document.createElement("tr");
        objectToHtml(row, game.title);
        objectToHtml(row, game.description);
        objectToHtml(row, game.thumbnail);
        objectToHtml(row, game.user.username);

        const versionsTd = document.createElement("td");
        const versionsUl = document.createElement("ul");
        
        game.gameversion.forEach(version => {
          const versionLi = document.createElement("li");
          versionLi.textContent = `${version.path} created at ${version.created_at}`;
          versionsUl.appendChild(versionLi);
        })
        versionsTd.appendChild(versionsUl);
        row.appendChild(versionsTd);
        
        const linktd = document.createElement("td");
        const link = document.createElement("a");
        link.href= "/XX_module_c/game/" + game.slug;
        link.textContent= "/XX_module_c/game/" + game.slug;
        linktd.appendChild(link);
        row.appendChild(linktd);

        tbody.appendChild(row);
      })
    }

    function objectToHtml(row, value) {
        const element = document.createElement("td");
        element.textContent = value;
        row.appendChild(element);
    }

    document.getElementById("search").addEventListener("input", () => {
      filterGames();
    })
    
  </script>
@endsection