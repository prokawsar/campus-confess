
$(document).on('click','#CreateVote',function () {
    var title = $('#title').val();
    var description = $('#description').val();
    var _token= $('input[name=_token]').val();
  
    var options=[];
    $('.option').each(function(){
        options.push($(this).val());
        // alert(options);
     });


    if(title=='' || user_id==''){
        $('.validation').text("Write Title !!");
    }else if(description == ''){
        $('.validation').text("Write Description !!");
    }else if(options.length < 2){
        $('.validation').text("Add more than 1 option !!");
    }else {
        $.ajax({
            type: 'post',
            url: '/createVote',
            data: {
                _token: _token,
                title: title,
                description: description,
                options: options // options
            },
            success: function (response) {
                $(".validation").hide();
                $(".postConfirm").show().delay(5000).fadeOut();
                $('.postConfirm').text(response['message']);
                document.getElementById("cform").reset();
                $('#voteTable').load(location.href + " #voteTable");
             
            },
            error: function (response) {
               alert(response.error);
            }
        })
    }
});

$(document).on('click','#doVote',function () {
    var vote_id = $('#voteID').val();
    var opt_id = $('#optionsID').val();
    var user_id = $('#user_id').val();
    
   // alert(opt_id);

    $.ajax({
        type: 'post',
        url: '/dovote',
        data: {
            _token: token,
            vote_id: vote_id,
            opt_id: opt_id,
            user_id: user_id
        },
        success: function(response){
            $('#doVote').hide();
            alert("Vote Counted");
        },
        error: function(response){
            alert(response.error);
        }
    })
});
