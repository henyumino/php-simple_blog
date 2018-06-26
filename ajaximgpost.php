<?php
    require_once "core/init.php";

    $post_id = $_POST['postid'];
    $output = '';
    $size = $_FILES['imagepost']['size'];
    $sum = 0;
    foreach ($size as $key => $value) {
        $sum+= $value;
    }
    
      if(isset($_FILES['imagepost']['name']) && is_array($_FILES)){
            if ($sum < 5000000) {
                foreach ($_FILES['imagepost']['name'] as $name => $value) {
                $file_name = explode(".",$_FILES['imagepost']['name'][$name]);
                $allowed_ext = array("jpg","jpeg","png","gif");
                if (in_array($file_name[1], $allowed_ext)) {
                    $new_name = md5(rand()) . '.' . $file_name[1];
                    $sourcePath = $_FILES['imagepost']['tmp_name'][$name];
                    $targetPath = "postpic/".$new_name;
                        if(move_uploaded_file($sourcePath , $targetPath)){
                            // $output .= '<img src="'.$targetPath.'"/>';
                            // $output .= $targetPath;
                            $new_targetPath = "'".$targetPath."'";
                            $output .= '<div class="img-uplwhile" style="background-image: url('.$new_targetPath.');"></div>';
                            $admin->upload_multi_image('tb_imagepost', array(
                                'idallimagepost' => $post_id,
                                'imagename' => $targetPath
                            ));
                            
                        }
                    }
                }
            }
            else {
                echo "file terlalu besar";
            }
        echo $output;
      }


?>