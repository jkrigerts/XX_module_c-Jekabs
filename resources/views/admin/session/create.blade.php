<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Portal</title>
  <link rel="stylesheet" href="/css/style.css"/>
  <link rel="stylesheet" href="/css/global.css"/>
</head>
<body>
  <main class="login">
    <div class="login-container">
      <h1>Login</h1>
      <form method="POST" action="/XX_module_c/admin">
        @csrf
        <div class="login-input-group">
          <label for="username">Username</label>
          <input id="username" name="username"/>
          <label for="password">Password</label>
          <input id="password" name="password" type="password"/>
        </div>
        @error("username")
          <p>{{$message}} </p>
        @enderror
        @error("password")
          <p>{{$message}} </p>
        @enderror
        <button>Log in</button>
      </form>
    </div>
  </main>
</body>
</html>