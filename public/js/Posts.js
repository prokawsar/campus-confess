/**
 * Created by Nahid Islam on 11/8/2017.
 */

$(document).ready(function () {
    $(".postConfirm").hide();
});

$(document).on('click','#addPost',function () {
    var posts= $('#posts').val();
    var user_id= $('#user_id').val();
    var cat_id= $('#category').val();
    var _token= $('input[name=_token]').val();

    if(posts=='' || user_id==''){
        $('.validation').text("Write something !!");
    }else {

        $.ajax({
            type: 'post',
            url: 'storePosts',
            data: {
                _token: _token,
                posts: posts,
                user_id: user_id,
                cat_id: cat_id
            },
            success: function (response) {
                $(".validation").hide();
                $(".postConfirm").show().delay(5000).fadeOut();
                $('.postConfirm').text(response['message']);
                document.getElementById("cform").reset();

                $('#postsTable').load(location.href + " #postsTable");
            },
            error: function (response) {
                alert(response);
            }
        })
    }
});


$(document).on('click','#likeArea',function () {
    var postid = $(this).data('id');
    var userid = $(this).data('id1');

    $.ajax({
        type: 'post',
        url: '/post_like',
        data: {
            _token:token,
            post_id: postid,
            user_id: userid
        },
        success: function (response) {
            // console.log(response['message']);
            $('#'+postid+'areaDefine').load(location.href+ ' #'+postid+'areaDefine');
            // $('#reload'+postid).load(window.location.href + ' #reload'+postid);
        },

        error: function (response) {
            console.log(response['error']);
        }
    });

});



$(document).on('click','#unlikeArea',function () {
    var postid = $(this).data('id');
    var userid = $(this).data('id1');

    $.ajax({
        type: 'post',
        url: '/dislike',
        data: {
            _token:token,
            post_id: postid,
            user_id: userid
        },
        success: function (response) {
            // console.log(response['data']);

            $('#'+postid+'areaDefine').load(location.href+ ' #'+postid+'areaDefine');
            // $('#reload'+postid).load(window.location.href + ' #reload'+postid);
        },
        error: function (response) {
            console.log(response['data']);
        }
    });

});

$(document).on('click','#commentArea',function () {
    // alert("ok");
    // var comment=$('#comment').val();
    // alert(comment);
    var postid = $(this).data('id');
    var userid = $(this).data('id1');


});

function postButtonClicked(id){

    var elementId = document.getElementById(id+'comment');
    var comment=elementId.value;
    if(comment==''){
       alert("Can't make an empty comment !");
    }else{

        $.ajax({

            type:'post',
            url:'/postComment',
            data:{
                _token:token,
                comment:comment,
                post_id:id
            },
            success:function (data) {

            }
        });

        $('#reload'+id).load(window.location.href + ' #reload'+id);

    }
}



$(document).on('click','.delete',function(){
    var id=$(this).data('id');
    $('#delepostInputField').val(id);
});

$(document).on('click','.deletePost',function(){
    // alert($('#delepostInputField').val());
    if($('#delepostInputField').val()!=''){
        $.ajax({
            type:'post',
            url:'deletePost',
            data:{
                _token:token,
                id:$('#delepostInputField').val()
            },
            success:function (response) {
                $('#myModal').modal('hide');
                $('#delConfirm').text("Your this post has been removed !!");
                $('#delConfirm').css('margin-bottom','10px');
                $('#myConfessTable').load(location.href + ' #myConfessTable');
            }

        });
    }

});

$(document).on('click','#CreateVote',function () {
    var title = $('#title').val();
    var description = $('#description').val();
    var _token= $('input[name=_token]').val();
  
    var options=[];
    $('.option').each(function(){
        options.push($(this).val());
        // alert(options);
     });


    // alert(options.length);

    if(title=='' || user_id==''){
        $('.validation').text("Write Title !!");
    }else if(description == ''){
        $('.validation').text("Write Description !!");
    }else if(options.length < 2){
        $('.validation').text("Input more than 1 option !!");
    }else {
        $.ajax({
            type: 'post',
            url: '/createVote',
            data: {
                _token: _token,
                title: title,
                description: description,
                options: options // options // its array of options
            },
            success: function (response) {
                $(".validation").hide();
                $(".postConfirm").show().delay(5000).fadeOut();
                $('.postConfirm').text(response['message']);
                document.getElementById("cform").reset();
                $('#voteTable').load(location.href + " #voteTable");
                alert('Vote created');
                // console.log(response);
            },
            error: function (response) {
               alert(response.error);
            }
        })
    }
});

