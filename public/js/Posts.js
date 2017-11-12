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

// Like and Unlike function

$(document).on('click','#like',function () {
    var postid = $(this);
    var userid = $(this);
    var divId=$(this);

    $.ajax({
        type: 'post',
        url: 'post_like',
        data: {
            _token:token,
            post_id: (postid.data('id')),
            user_id: (userid.data('id1'))
        },
        success: function (response) {
            console.log(response['message']);
        },

        error: function (response) {
            console.log(response['error']);
        }
    });
});


$(document).on('click','#dislike',function () {

    var postid = $(this);
    var userid = $(this);

    $.ajax({
        type: 'post',
        url: 'dislike',
        data: {
            _token:token,
            post_id: (postid.data('id')),
            user_id: (userid.data('id1'))
        },
        success: function (response) {
            console.log(response['data']);

        },
        error: function (response) {
            console.log(response['data']);
        }
    });
});
