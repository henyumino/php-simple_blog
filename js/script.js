// $(document).ready(function(){
    
    $('#first-tab').on('click',function(){
        $('#first-tab').css('background','#1194f6');
        $('#second-tab,#third-tab').css('background','#171717');
        $('#second-tab-isi,#third-tab-isi').hide();
        $('#first-tab-isi').fadeIn(550);
    });
    $('#second-tab').on('click',function(){
        $('#second-tab').css('background','#1194f6');
        $('#first-tab,#third-tab').css('background','#171717');
        $('#first-tab-isi,#third-tab-isi').hide();
        $('#second-tab-isi').fadeIn(550);
    });
    $('#third-tab').on('click',function(){
        $('#third-tab').css('background','#1194f6');
        $('#first-tab,#second-tab').css('background','#171717');
        $('#second-tab-isi,#first-tab-isi').hide();
        $('#third-tab-isi').fadeIn(550);
    });

    $('.menu-samping').on('click',function(){
        $('.ham-menu').slideToggle(300);
    });

    $('.toggle-dash').on('click',function(){
        
        var state = $('.dash-sidemenu').is(':visible');
        var estate = $('.dash-sidemenu').is(':hidden');

        if(state){
            $('.dashboard-header').css({'width':'100%'});
        }
        if(estate){
            $('.dashboard-header').css({'width':'85%'});
        }

        $('.dash-sidemenu').animate({
            width : 'toggle'
        });
    });

    $('.user-name i').on('click',function(){
        $('.menu-user').animate({
            height : 'toggle'
        });
        
        var prop = parseInt($('.user-name i').attr('style').split('rotate(')[1].split('deg)')[0]);
        
        if(prop == 0){
            $('.user-name i').css({
                'transform':'rotate(-180deg)'
            });
        }
        else{
            $('.user-name i').css({
                'transform':'rotate(0deg)'
            });
            
        }
        
    });
    
    // text editor

    //heading function
    $('#head-selector').on('change',function(){
        if($('#head-selector').val() == 'head1'){
           document.execCommand('formatBlock', false, '<h1>');
        }
        else if($('#head-selector').val() == 'head2'){
            document.execCommand('formatBlock', false, '<h2>');
        }
        else if($('#head-selector').val() == 'head3'){
            document.execCommand('formatBlock', false, '<h3>');
        }
        else{
            document.execCommand('formatBlock', false, '<div>');
        }
    });

    //tool function
    var btn_bold = false;
    var bgcolorbld;
    var clc_bld = 0;
    $('#bold').on('click', function() {
        if(clc_bld !== 0){  
            document.execCommand('bold',false,'');
            if (btn_bold = !btn_bold) {
                bgcolorbld = $(this).css('border');
                $(this).css("border", "1px solid #888");
            } else {
                $(this).css("border", bgcolorbld);
            }
        }
        ++clc_bld;
        
    });

    var btn_italic = false;
    var bgcoloritc;
    var clc_itc = 0;
    $('#italic').on('click', function() {
        
        if(clc_itc !== 0){
            document.execCommand('italic');  
            if (btn_italic = !btn_italic) {
                bgcoloritc = $(this).css('border');
                $(this).css("border", "1px solid #888");
            } else {
                $(this).css("border", bgcoloritc);
            }
        }
        ++clc_itc;

        
    });

    var btn_al = false;
    var bgcoloral;
    var clc_al = 0;
    $('#align-left').on('click', function() {
        if(clc_al !== 0){  
            document.execCommand('JustifyLeft');
            if (btn_al = !btn_al) {
                bgcoloral = $(this).css('border');
                $(this).css("border", "1px solid #888");
            } else {
                $(this).css("border", bgcoloral);
            }
        }
        ++clc_al;
        
    });

    var btn_ac = false;
    var bgcolorac;
    var clc_ac = 0;
    var sts = 'noaktif';
    $('#align-center').on('click', function() {
        if(clc_ac != 0){          
            if (btn_ac = !btn_ac) {
                document.execCommand('JustifyCenter');
                bgcolorac = $(this).css('border');
                $(this).css("border", "1px solid #888");
                sts = 'aktif';
            } else {
                $(this).css("border", bgcolorac);
                sts = 'noaktif';
                document.execCommand('JustifyLeft');
            }
            
        }
        ++clc_ac;
        
    });

    var btn_ar = false;
    var bgcolorar;
    var clc_ar = 0;
    var sts2 = 'noaktif';
    $('#align-right').on('click', function() {
        if(clc_ar != 0){          
            if (btn_ar = !btn_ar) {
                document.execCommand('JustifyRight');
                bgcolorar = $(this).css('border');
                $(this).css("border", "1px solid #888");
                sts2 = 'aktif';
            } else {
                $(this).css("border", bgcolorar);
                sts2 = 'noaktif';
                document.execCommand('JustifyLeft');
            }
            
        }
        ++clc_ar;
        
    });

    // create link

    var btn_cl = false;
    var bgcolorcl;
    var clc_cl = 0;
    $('#create-link').on('click', function() {
        if(clc_cl != 0){          
            if (btn_cl = !btn_cl) {
                var pro = prompt('Masukan link','https://');
                if (pro != null) {
                    document.execCommand('CreateLink',false,pro);
                }
                bgcolorcl = $(this).css('border');
                $(this).css("border", "1px solid #888");
            } else {
                $(this).css("border", bgcolorcl);
                document.execCommand('unlink',false,null);
            }
        }
        ++clc_cl; 
    });

    $('#unlink').on('click',function(){
        document.execCommand('unlink',false,null);
    });


    // $('.close-wrap').on('click',function(){
    //     $('.wrap-modal').css('display','none');
    //     $('#create-link').css("border", '1px solid transparent');
    //     $('.link-val').val('');
    // });

    // $('.submit-link').on('click',function(){      
    //     $('#create-link').css("border", '1px solid transparent');
    //     $('.link-val').val('');
    // });


    // end of crate link


    //check empty contenteditable
    $('.text-content').on('click',function(){
        if($('.text-content').text().trim() == 0){
            
        }
        else{
            
        }
    });
    
    // permalink function
    var rslug = '';
    $('.post_title').on('keyup',function(){
        
        var slug = $('.post_title').val();
        slug = slug.replace(/ /g, "-");
        rslug = slug;
        slug = 'https://'+'blogname.com?slug='+slug;
        
        var limitslug = slug.length;
        if(limitslug > 76){
            slug = slug.substring(0,76);
            slug = slug+'...';
            $('.permalink-slug').text(slug);
        }
        else{
            $('.permalink-slug').text(slug);
        }
    });

    // $('.submitpost').on('click',function(){
    //     var ttl = $('.text-content').html();
    //     console.log(ttl);
    // });
    
    // categories tab function
    $('#tab-cat-1').on('click',function(){
        $('#tab-show-1').css('display','block');
        $('#tab-show-2').css('display','none');
        $('#tab-cat-1').addClass('cat-tab-active');
        $('#tab-cat-2').removeClass('cat-tab-active');
    });

    $('#tab-cat-2').on('click',function(){
        $('#tab-show-1').css('display','none');
        $('#tab-show-2').css('display','block');
        $('#tab-cat-2').addClass('cat-tab-active');
        $('#tab-cat-1').removeClass('cat-tab-active');
    });

    // post reply thread function
    
    $('.reply-expanded').on('click',function(){
        var expanded = parseInt($(this).find('i').attr('style').split('rotate(')[1].split('deg)')[0]);
        if(expanded == 0){
            $(this).find('i').css('transform','rotate(-90deg)');
        }
        else{
            $(this).find('i').css('transform','rotate(0deg)');
        } 
        $(this).parent().find('.comment-reply').toggle();
        $(this).parent().find('.comment-input .komentar').toggle();
    });

    // $('body').on('click',function(){
    //     var test2 = $(this).find('.reply-expanded');
    //     console.log(test2);
    // });

    // img upload post function
    $('#insert-image').on('click',function(){
        $('.upload-wrap').css('display','block');   
    });


    $('#close-uplbox').on('click',function(){
        $('.upload-wrap').css('display','none');
    });

    $('.cat-box').on('change', function() {
        $('.cat-box').not(this).prop('checked', false);  
    });
    var imageselected = '';
    $(document).on('click','.img-uplwhile',function(){
        $(this).css('border','1px solid #1194f6');
        $('.img-uplwhile').not(this).css('border','1px solid transparent');
        imageselected = $(this).css('background-image');
        imageselected = imageselected.replace('url(','').replace(')','').replace(/\"/gi, "");
        // console.log(imageselected);
    });


    $('.add-imgpost').on('click',function(){
        if(imageselected != ''){
            $('.text-content').append('<img src="'+imageselected+'" />');
        }
        else{
            alert('no image selected');
        }
    });

    $('.add-category-title').on('click',function(){
        $('.add-category-value').toggle();
        $('.add-category').toggle();
    });

    
    var spanpembuka = '<span class="tagchecklist-wrap">';
    var buttondelete = '<button class="delete-tags"><i class="fa fa-close fa-1x"></i></button>';
    var tagsnama = '<a class="tag-name">';
    var tagspenutup = '</a></span>';
    var tagvalue = '<input type="text" class="tag-val" value="';
    var tagvaluetutup = '"/>';
    var tagsave = [];

    $('.tags-submit').on('click',function(){
        tags = $('.input-tags').val();
        tags = tags.replace(/\s/g, '');
        tags = tags.split(',');
        tags = tags.filter(function(str) {
            return /\S/.test(str);
        });
        // array filter kembar
        $.each(tags, function(a, el){
            if($.inArray(el, tagsave) === -1){
                tagsave.push(el);
            }
        });
        // array filter end
        $('.input-tags').val('');

        $('.tagchecklist-wrap').remove();
        tagsave.forEach(function(newtags) {
            $('.tags-wrap').append(spanpembuka+tagvalue+newtags+tagvaluetutup+buttondelete+tagsnama+newtags+tagspenutup);
        });
        // console.log(tagsave);
    });

    $(document).on('click','.delete-tags',function(){
        $(this).parent('.tagchecklist-wrap').remove();
        deleteval = $(this).parent('.tagchecklist-wrap').find('.tag-val').val();
        deletearr = tagsave,
                    deleteval,
                   posisi = tagsave.indexOf(deleteval);
        if(~posisi){
            tagsave.splice(posisi, 1);
        }

    });

    $('.reply-user').on('click',function(){
        testcmt = $(this).parents('.comment-block').find('.comment-input').css('display','block');
    });
    
    // $('.text-editor').on('click',function(){
    //     console.log(tagsave);
    // });
// });


