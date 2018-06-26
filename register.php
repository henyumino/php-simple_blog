<?php
    require_once "core/init.php";

    $admin = new Admin();

    if(Input::get('submit')){
          $admin->register_admin(array(
              'nama'    => Input::get('adminname'),
              'email'   => Input::get('email'),
              'password'=> password_hash(Input::get('password'), PASSWORD_DEFAULT),
              'idfoto'  => 'image/dummy.png'
          ));
    }
?>
<html>
    <head>
        <title>Admin register</title>
    </head>
<body>
    <form action="register.php" method="post">
        <label>nama admin</label>
        <br>
        <input type="text" name="adminname">
        <br>
        <label>email</label>
        <br>
        <input type="text" name="email">
        <br>
        <label>password</label>
        <br>
        <input type="password" name="password">
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>