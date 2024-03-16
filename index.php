<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SOBA APP</title>
  <!-- <link rel="stylesheet" href="index.css"> -->
  <link rel="icon" href="assets/img/soba.png">
</head>

<style>
  body {
  background-color: #763C00;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background-image: url("assets/img/soba.png");
  background-size: 450px 400px;
  background-repeat: no-repeat;
  background-position: center;
}

* {
  font-family: sans-serif;
  box-sizing: border-box;
}

form {
  width: 500px;
  border-radius: 2px solid #ccc;
  padding: 30px;
  background-color: rgba(255, 255, 255, 0.5);
  backdrop-filter: blur(4px);
  border-radius: 15px;
}

.title {
  text-align: center;
  margin-bottom: 40px;
}

input {
  display: block;
  border: 2px solid #ccc;
  width: 95%;
  padding: 10px;
  margin: 10px auto;
  border-radius: 5px;
}


h2 {
  color: #763C00;
}

label {
  color: #763C00;
  font-size: 18px;
  padding: 10px;
}

button {
  display: block;
  width: 30%;
  background: #763C00;
  padding: 10px;
  color: #FBE3A9;
  border-radius: 3px;
  margin: 10px auto;
  border: none;
}

button:hover {
  opacity: 0.7;
}

.error {
  background: #f2dede;
  color: #a94442;
  padding: 10px;
  width: 95%;
  border-radius: 5px;
}

</style>

<body>
  <div class="login">
    <form action="cek_login.php" method="POST">
      <h2 class="title">DESA SOBA</h2>
      <h2 class="title">Login</h2>
      <?php if (isset($_GET['error'])) { ?>
        <p class="error">
          <?php echo $_GET['error']; ?>
        </p>
      <?php } ?>
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" autocomplete="off" placeholder="Masukan Username" required />
        <br />
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Masukan Password" required />
        <br />
        <button type="submit" value="login">Login</button>
      </div>
    </form>
  </div>
</body>

</html>