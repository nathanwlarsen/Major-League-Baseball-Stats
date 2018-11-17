<html>
<head>
  <title>Test Cookies</title>
</head>
<style>

input[type=text], select {
  font-size: 14pt;
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  font-size: 14pt;
  width: 100%;
  background-color: #2980B9;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #154360;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>

<body>
  <?php
  if(count($_COOKIE[name]) > 0) {
    echo "Welcome " . $_COOKIE[name] . "!<br />If this is not you, please enter your name below.<br />";
  }
  else {
    echo "Please enter your name below:<br />";
  }
  ?>
  <form action="http://localhost/~nathanwlarsen/cookie.php" method="post">
    <p>Name: <input type="text" name="name" value=""/></p>
    <p><input type="submit" name="submit" value="Send"/></p>
  </form>
</body>
</html>
