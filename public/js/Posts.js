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
    // var divId=$(this);
    // alert(postid);
    // var id=$('#'+postid+'-like');


    // alert('#'+postid+'-like');
    // $('#'+postid+'like').attr("class","btn btn-danger");




    // var id = elements[0].getAttribute('id');
    // alert(id);

    // alert(divId.data('id2'));
    // document.getElementById('#'+postid+'-like').load(location.href + " #"+postid+'-like');



    $.ajax({
        type: 'post',
        url: 'post_like',
        data: {
            _token:token,
            post_id: postid,
            user_id: userid
        },
        success: function (response) {
            console.log(response['message']);
            $('#'+postid+'areaDefine').load(location.href+ ' #'+postid+'areaDefine');
            // location.reload();

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
        url: 'dislike',
        data: {
            _token:token,
            post_id: postid,
            user_id: userid
        },
        success: function (response) {
            console.log(response['data']);
            $('#'+postid+'areaDefine').load(location.href+ ' #'+postid+'areaDefine');
        },
        error: function (response) {
            console.log(response['data']);
        }
    });
});

// $(document).on('submit','#1form',function () {
//     // alert("ok");
//     var comment=$('#comment').val();
//     alert(comment);
//
// });






$(document).ready(function () {
    // setTimeout(function(){ ('#posts'); }, 3000);

    // setInterval(function(){
    //     $('#postsDiv').load(location.href+ ' #postsDiv');
    // },3000);

});

$(document).ready(function(){
    // $(".comments").hide();
    //
    // $(".hideButton").click(function(){
    //     var id = $('.hideButton').attr('id');
    //     alert(id);
    //
    //     // $(".comments").hide();
    // });
    // $("#show").click(function(){
    //     $(".comments").show();
    // });


});


function submit()
{

    var comment = document.getElementById("1comment").value;
    alert(comment);
}



