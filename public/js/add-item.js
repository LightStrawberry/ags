$(document).ready(function() {
    $('#photoimg').on('change', function() {
    var A=$("#up_status");
    var B=$("#up_btn");
    $("#imageform").ajaxForm({
        target: '#preview', 
        beforeSubmit:function(){
            A.show();
            B.hide();
        }, 
        success:function(){
            A.hide();
            B.show();
        }, 
        error:function(){
            A.hide();
            B.show();
        } 
        }).submit();
    });
});
