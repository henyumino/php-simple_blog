<?php
    require_once "core/init.php";

    $category = $_POST['category']; 
    
    if($admin->add_category($kolom = array('category'=> $category))){
        echo '<div class="category-section">';
        echo '<input type="checkbox" class="cat-box" value="'.$category.'">';
        echo '<label> '.$category.'<label>';
        echo '</div>';
    }
    else {
        echo "gagal add";
    } 
   
?>