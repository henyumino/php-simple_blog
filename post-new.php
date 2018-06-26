<?php
    require_once "core/init.php";

    if( !Session::cek_sesi('email') ){
        header('Location: login.php');
    }

    $email = Session::get('email');
    $result = $admin->profile_admin($email);
    $new_result = array();
    while($row = $result->fetch_assoc()){
        $new_result[] = $row;
    }
    $new_result = call_user_func_array('array_merge',$new_result);

    $post_id = time();
    $writter = $new_result['nama'];

    $new_category = $admin->get_category('tb_category');
    
?>
<html>
    <head>
        <title>Add New Post</title>
    </head>
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/font-awesome.min.css">
<body>
<div class="upload-wrap">
    <div class="upload-box">
        <i class="fa fa-close fa-1x" id="close-uplbox"></i>
        <h2>Add Images</h2>
        <hr class="underline-h2">
        <form action="#" id="imgform" enctype="multipart/form-data">
            <button class="btn-filechoose"><i class="fa fa-upload fa-1x"> Choose File</i></button>
            <input type="file" id="input-foto" name="imagepost[]" value="" multiple/>
        </form>
        <div class="while-img-upl">
            
        </div>
        <button class="add-imgpost">Add Selected</button>
    </div>
</div>
<div class="test-content"></div>
    <div class="wrap-modal">
        <div class="modalbox-addlink">
            <span>Add Link</span>
            <input type="text" class="link-val">
            <button class="close-wrap">Cancel</button>
            <button class="submit-link">Submit</button>
        </div>
    </div>
    <div class="dash-sidemenu">
        <div class="profile-box">
            <div class="profile-photo">
                <div class="dash-profile-photo" style="background-image: url('<?= $new_result['idfoto']?>');"></div>
            </div>
            <span class="user-name"><?= $new_result['nama']?> <i class="fa fa-angle-down fa-1x" style="transform: rotate(0deg)"></i></span>
        </div>
        <div class="menu-user">
            <div class="dash-menutab">
                <span class="dash-menutab-sib">
                    <i class="fa fa-cog fa-1x"></i> 
                    <a>Edit Profile</a>
                </span> 
            </div>
            <div class="dash-menutab">
                <span class="dash-menutab-sib">
                    <i class="fa fa-sign-out fa-1x"></i> 
                    <a>Logout</a>
                </span> 
            </div>
        </div>
        <div class="sidemenu-top">
            <span class="dash-tab">
                <i class="fa fa-dashboard fa-1x"></i>
                <a>Dashborad</a>
            </span>
        </div>
        <div class="sidemenu-box">
            <div class="dash-menutab" id="dash-active">
                <span class="dash-menutab-sib">
                    <i class="fa fa-file fa-1x"></i>
                    <a>Posts</a> 
                </span>
                <i class="fa fa-caret-left fa-2x" id="caret"></i>
            </div>
            <div class="dash-menutab">
                <span class="dash-menutab-sib">
                    <i class="fa fa-comment fa-1x"></i>
                    <a>Comments</a>
                </span>
            </div>
            <div class="dash-menutab">
                <span class="dash-menutab-sib">
                    <i class="fa fa-paint-brush fa-1x"></i>
                    <a>Appearance</a>
                </span>
            </div>
            <div class="dash-menutab">
                <span class="dash-menutab-sib">
                    <i class="fa fa-cog fa-1x"></i>
                    <a href="setting.php">Setting</a>
                </span>
            </div>
        </div>
    </div>
    <div class="dashboard-header">
        <!-- hide show menu , search box -->
        <div class="toggle-dash">
            <i class="fa fa-bars fa-2x"></i>
        </div>
        <div class="addpost-head">
            <i class="fa fa-file-text fa-2x"></i>
        </div>
    </div>
    <div class="dash-body">
        <div class="main-post-body">
            <span class="title-page">Add New Post</span>
            <div class="publish-box">
                <span>Publish</span>
                <div class="status-box">
                    <button class="save-draft">Save Draft</button>
                    <span style="border: none;"><a style="font-weight: normal;">Status :</a> Draft</span>
                </div>
                <div class="publish-action">
                    <a href="dashboard.php">Move to trash</a>
                    <button class="submitpost">Publish</button>
                </div>
            </div>
            <div class="tag-box">
                <span>Categories</span>
                <div class="categories-wrap">
                    <div class="categories-tab">
                        <ul>
                            <li class="cat-tab-active" id="tab-cat-1">All Categories</li>
                            <li id="tab-cat-2">Most Used</li>
                        </ul>
                    </div>
                    <div class="categories-main">
                        <div class="categories-main-body" id="tab-show-1">
                            <div class="checkbox-wrapper">
                                <?php while($new_cat = $new_category->fetch_assoc()):?>
                                    <div class="category-section">
                                        <input type="checkbox" class="cat-box" value="<?= $new_cat['category'];?>">
                                        <label for=""><?= $new_cat['category'];?></label>
                                    </div>
                                <?php endwhile;?>
                                <div class="category-section-bef">
                                    <input type="checkbox" class="cat-box">
                                    <label for="">Uncategorized</label>
                                </div>
                            </div>
                        </div>
                        <div class="categories-main-body" id="tab-show-2">
                            <div class="checkbox-wrapper">
                    
                                <input type="checkbox">
                                <label for="">Tloer test</label>
                                <br>
                            
                                <input type="checkbox">
                                <label for="">Uncategorized</label>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="add-category-title">+ Add New Category</a>
                    <input type="text" class="add-category-value">
                    <input type="submit" class="add-category" value="Add New Category">
            </div>
            <div class="add-tags">
                <span>Add Tags</span>
                <input type="text" class="input-tags">
                <input type="submit" class="tags-submit" value="Add">
                <a>Seperate tags with commas</a>
                <div class="tags-wrap">
                    
                </div>
            </div>
            <div class="input-title">
                <input type="text" name="" class="post_title" placeholder="Enter Title Here">
            </div>
            <div class="permalink">
                <span>Permalink: <a class="permalink-slug">https://blogname.com?slug=</a></span>
            </div>
            
            <div class="text-editor">
                <div class="tool-editor">
                    <div class="heading-selector">
                        <select name="" id="head-selector" autocomplete="off">
                            <option value="">Heading</option>
                            <option value="head1">Heading 1</option>
                            <option value="head2">Heading 2</option>
                            <option value="head3">Heading 3</option>
                        </select>
                    </div>
                    <div class="text-editor-icon">
                        <button class="editor-icon" id="bold"><i class="fa fa-bold fa-2x"></i></button>
                        <button class="editor-icon" id="italic"><i class="fa fa-italic fa-2x"></i></button>
                        <button class="editor-icon" id="align-left"><i class="fa fa-align-left fa-2x"></i></button>
                        <button class="editor-icon" id="align-center"><i class="fa fa-align-center fa-2x"></i></button>
                        <button class="editor-icon" id="align-right"><i class="fa fa-align-right fa-2x"></i></button>
                        <button class="editor-icon" id="create-link"><i class="fa fa-chain fa-2x"></i></button>
                        <button class="editor-icon" id="unlink"><i class="fa fa-unlink fa-2x"></i></button>
                        <button class="editor-icon" id="insert-image"><i class="fa fa-picture-o fa-2x"></i></button>
                    </div>
                </div>
                <div class="text-content" contenteditable="true">
                    
                </div>
            </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/script.js"></script>
<script>
    // $('.submitpost').on('click',function(){
    //     var ttl = $('.text-content').html();
    //     var titlepost = $('.post_title').val();
    //     console.log(titlepost);
    // });

    $('.save-draft').on('click',function(){
        var valpost = $('.text-content').html();
        var titlepost = $('.post_title').val();
        var category  = $('.cat-box:checked').val();
        var newtag = tagsave.toString();
        
        $.ajax({
            method: 'POST',
            url   : 'ajaxpage.php',
            data : {
                idpost : '<?= $post_id;?>',
                writter : '<?= $writter;?>',
                isipost : valpost,
                slug    : rslug,
                posttitle : titlepost,
                category : category,
                tag : newtag
            },
            success: function(data){
                window.location = 'post.php?postid=<?= $post_id?>';
            }
        });
    });

    $('#imgform').on('change',function(){
        var jumlahfile = $('input', this)[0].files.length;
        
        if (jumlahfile <= 5) {
            var post_id = '<?= $post_id;?>';
            var formData = new FormData(this);
            formData.append('postid',post_id);
            console.log(formData);
            
            $.ajax({
                url: "ajaximgpost.php",
                type: "POST",
                data : formData,
                contentType: false,
                processData: false,
                success : function(data){
                    $('.while-img-upl').append(data);
                    // console.log(data);
                },
                error : function(data) {
                    console.log('error');
                } 
            });
        }
        else{
            alert('file terlalu banyak maks 5');
            $('#input-foto').removeAttr('value');
        }
    });
    var newcategory = '';
    $('.submitpost').on('click',function(){
        var valpost = $('.text-content').html();
        var titlepost = $('.post_title').val();
        newcategory  = $('.cat-box:checked').val();
        var newslug = rslug;
        var newtag = tagsave.toString();

        if (newslug == '') {
            newslug = '';
        }
        if (newcategory == null) {
            newcategory = null;
        }

        $.ajax({
            type: 'POST',
            url   : 'ajaxpost.php',
            data : {
                idpost : '<?= $post_id;?>',
                writter : '<?= $writter;?>',
                isipost : valpost,
                slug    : newslug,
                posttitle : titlepost,
                category : newcategory,
                tag : newtag
            },
            success: function(data){
                window.location = 'dashboard.php';
                // console.log(data);
            }
        });
    });

    $('.add-category').on('click',function(){
        new_category = $('.add-category-value').val();
        if(new_category != ''){
            $.ajax({
                url : 'ajaxcategory.php',
                type : 'POST',
                data : { category : new_category },
                success : function (data) {
                    $('.category-section-bef').before(data);
                    $('.add-category-value').val('');
                    console.log(data);
                }
            });
        }
        else{
            alert('tidak boleh kosong');
        }
    });    

</script>
</body>
</html>