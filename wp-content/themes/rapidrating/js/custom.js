
$(document).ready(function(){
    var ppp = 3; // Post per page
var cat = 8;
var pageNumber = 1;


function load_posts(){
    pageNumber++;
    var str = '&cat=' + cat + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
    $.ajax({
        type: "POST",
        dataType: "html",
        url: ajax_posts.ajaxurl,
        data: str,
        success: function(data){
            var $data = $(data);
            if($data.length){
                $("#ajax-posts").append($data);
                $("#more_posts").attr("disabled",false);
            } else{
                $("#more_posts").attr("disabled",true);
            }
        },
        error : function(jqXHR, textStatus, errorThrown) {
            $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
        }

    });
    return false;
}

$("#more_posts").on("click",function(){ // When btn is pressed.
    $("#more_posts").attr("disabled",true); // Disable the button, temp.
    load_posts();
});
});

/** Collapse Accordian **/
$('.panel-collapse').on('show.bs.collapse', function () {
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
});


/** Price Calculator **/
$('#demo').hide;
$('#productForm').on('submit',function(event) {
    $('button').addClass("collapse");
    $('button').attr('data-target', '#demo');
    $('#demo').show;
})

/*$(".price-calculator").click(function(event){
    //alert("As you can see, the link no longer took you to jquery.com");
    event.preventDefault();
    $('#demo').show;
  });*/


  