<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Portal</title>
  <link rel="stylesheet" href="/css/global.css"/>
  <link rel="stylesheet" href="/css/dashboard.css"/>
</head>
<body>
  <header>
    <div class="desc">Administrator Portal</div>
    @if(Auth::guard("admin")->check())
      <form method="POST" action="/XX_module_c/admin/logout">
          @csrf
          <button>Log out</button>
      </form>
    @else
      <p>Kakis</p>
    @endif
  </header>
  <div class="wrapper">
    <aside>
      <a href="/XX_module_c/admin/admins">Admins</a>
      <a href="/XX_module_c/user">Users</a>
      <a href="/XX_module_c/game">Games</a>
    </aside>
    <main>
      @yield('content')
    </main>
  </div>
</body>
</html>