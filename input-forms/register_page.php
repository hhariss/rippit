<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Rippit</title>
    <link rel="icon" type="image/png" href="../img/whiteclaws.png" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <script
      src="https://kit.fontawesome.com/6ba144ce88.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../styles/style.css" />
  </head>
  <main>
    <body>
      <header>
        <nav class="navbar">
          <a href="../index.php">
            <img alt="Logo" src="../img/whiteclaws.png" width="150" />
          </a>
        </nav>
      </header>
      <form
        class="container col-7 font-monospace"
        method="post"
        action="../php/insert_user.php"
      >
        <div class="form-group mt-3">
          <h1>register</h1>
          <label>username</label>
          <input
            class="form-control font-monospace"
            placeholder="enter username"
            name="username"
            required
            minlength="3"
          />
        </div>
        <div class="form-group mt-3">
          <label class="font-monospace">password</label>
          <input
            type="password"
            class="form-control"
            placeholder="enter password"
            name="password"
            required
            minlength="5"
          />
        </div>
        <button type="submit" class="btn btn-secondary mt-4">register</button>
      </form>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"
      ></script>
    </body>
  </main>
</html>
