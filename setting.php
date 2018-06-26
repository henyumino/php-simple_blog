<?php
    require_once "core/init.php";

    if( !Session::cek_sesi('email') ){
        header('Location: login.php');
    }

    $email = Session::get('email');
    $result = $admin->profile_admin($email);

    if (Input::get('submit')) {
        $nama = Input::get('nama');

        $nama_file = $_FILES['userpic']['name'];
        $asal_file = $_FILES['userpic']['tmp_name'];
        $error_file = $_FILES['userpic']['error'];
        $size_file = $_FILES['userpic']['size'];
        $format_file = $_FILES['userpic']['type'];
        $nama_file_new = 'adminpic/'.$nama_file;
        $angka_unik = time();
        
        
        if($size_file != 0){
            if($size_file < 5000000){
                
                if($format_file == 'image/jpeg' || 'image/png'){
                    
                    if(file_exists($nama_file_new)){
                        if($format_file == 'image/jpeg'){
                            $nama_file_new = str_replace('.jpg','',$nama_file_new);
                            $nama_file_new = $nama_file_new."_".$angka_unik.".jpg";
                            $nama_file_final = $nama_file_new;       
                        }
                        else if($format_file = 'image/png'){
                            $nama_file_new = str_replace(".png","",$nama_file_new);
                            $nama_file_new = $nama_file_new."_".$angka_unik.".png"; 
                            $nama_file_final = $nama_file_new;
                        }
                    }
                        if($admin->update_profile($nama ,$nama_file_final,$email)){
                            header('Location: dashboard.php');
                        }
                        else{
                            echo "gagal update";
                        }
                    
                    move_uploaded_file($asal_file, $nama_file_new);
                }
                else{
                    echo "format file gambar tidak sesuai";
                }
            }
            else if($size_file >= 0){
                
            }
            else{
                echo "gambar terlalu besar";
            }
        }
        else {
            if($admin->update_profile_nopic($nama ,$email)){
                header('Location: dashboard.php');
            }
            else{
                echo "gagal update";
            }    
        }

        
        
    }
?>
<html>
    <head>
        <title>Edit Profile</title>
    </head>
<body>
    <form action="setting.php" method="post" enctype="multipart/form-data">
        <?php while($row = $result->fetch_assoc()):?>
            <label>Nama</label>
            <input type="text" name="nama" value="<?= $row['nama']?>">
            <br>
        <?php endwhile;?>
        <input type="file" name="userpic">
        <br>
        <input type="submit" name="submit" value="submit">
    </form>
</body>
</html>