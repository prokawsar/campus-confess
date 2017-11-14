/**
 * Created by Nahid Islam on 11/8/2017.
 */

$(document).ready(function () {
    $(".postConfirm").hide();
});

$(document).on('click','#addPost',function () {
    var posts=$('#posts').val();
    var user_id=$('#user_id').val();
    var _token=$('input[name=_token]').val();

    if(posts=='' || user_id==''){
        $('.validation').text("Write something !!");
    }else {

        $.ajax({
            type: 'post',
            url: 'storePosts',
            data: {
                _token: _token,
                posts: posts,
                user_id: user_id
            },
            success: function (response) {
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
        url: 'post_like',
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

//
// $(document).on('click','#like',function () {
//     var postid = $(this);
//     var userid = $(this);
//     var divId = $(this);
//
//     // alert(divId.data('id2'));
//     // document.getElementById('#'+postid+'-like').load(location.href + " #"+postid+'-like');
//
//
//
//
// });

$(document).on('click','#unlikeArea',function () {
    var postid = $(this).data('id');
    var userid = $(this).data('id1');

    $.ajax({
        type: 'post',
        url: 'dislike',
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

// var comment;
// function onload(id) {
//     comment = document.getElementById(id+'comment');
// }

function postButtonClicked(id){

    var elementId = document.getElementById(id+'comment');
    var comment=elementId.value;
    if(comment==''){
       alert("Not ");
    }else{

        $.ajax({

            type:'post',
            url:'postComment',
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



$(document).ready(function(){

});
// $('.show').click(function () {
//     var id=$(this).data('id');
//     // alert(id);
//     // var all = $('#commentsSec'+id).length;
//
//     $('#commentsSec'+id).slideDown("slow");
//
// });




