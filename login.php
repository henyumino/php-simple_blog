<?php
    require_once "core/init.php";

    $errors = array();

    if(Input::get('submit')){

        $validasi = new Validation();

        $validasi = $validasi->check(array(
            'email'     => array( 'required' => true ),
            'password'  => array( 'required' => true)
        ));

        if( $validasi->passed() ){
            if( $admin->login_admin(Input::get('email'),Input::get('password'))){
                Session::set('email' ,Input::get('email'));
                header('Location: dashboard.php');
            }
            else {
                echo "email atau password salah";
            }
        }
        else{
            $errors = $validasi->errors();
        }  
    }

    if(!empty($errors)){
        $errors = call_user_func_array('array_merge',$errors);
    }
       
?>
<html>
    <head>
        <title>Admin Login</title>
    </head>
<body>
    <form action="login.php" method="post">
        <label>Email</label>
        <br>
        <input type="text" name="email">
        <?php
            if (!empty($errors['email'])) {
                echo '<br>'.$errors['email'];
            }  
        ?>
        <br>
        <label>Password</label>
        <br>
        <input type="password" name="password">
        <?php 
            if(!empty($errors['password'])){
                echo '<br>'.$errors['password'];
            }    
        ?>
        <br>
        <input type="submit" name="submit" value="login">
    </form>
</body>
</html>