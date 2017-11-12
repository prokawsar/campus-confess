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

$(document).on('click','#like',function () {
    var postid = $(this);
    var userid = $(this);
    var divId=$(this);


    // var elements = document.getElementsByName('postDiv');
    // var id = elements[1].getAttribute('id');
    // alert(id);

    // alert(divId.data('id2'));
    // document.getElementById().load();



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
            location.reload();
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
            location.reload();
        },
        error: function (response) {
            console.log(response['data']);
        }
    });
});

$(document).ready(function () {
    // setTimeout(function(){ ('#posts'); }, 3000);

    // setInterval(function(){
    //     $('#postsDiv').load(location.href+ ' #postsDiv');
    // },3000);

});

function myFunction() {

    // document.getElementById("postsDiv").load();
}




