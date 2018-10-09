//Ajax Modal
$(document).ready(function(){

    $('.ajax-modal').on('show.bs.modal', function (e) {
        if (e.namespace === 'bs.modal') {
            var link = $(e.relatedTarget);
            $('.ajax-modal').find(".modal-content").load(link.attr("href"), function(){
                $(".select2-modal").select2();
            });
        }
    });

    //Destroy modal
    $('.ajax-modal').on('hide.bs.modal', function () {
        //alert("ok");
        $('.ajax-modal').removeData();
        //$('.modal').remove();
    });

    $(document).on("submit", "#login_form", function (e) {
        $.ajax({
            url: "processing.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            type: "POST",
            success: function (data) {
                var result = JSON.parse(data);
                if (result['errs'].length > 0) {
                    $('#login_error').css('display', 'block');
                    $('.error-login-message').html(result['errs']);
                }
                else {
                    if ($("#remember_me").is(':checked')) {
                        document.cookie = "email=" + email;
                        document.cookie = "password=" + password;

                    }

                    $('#login_error').css('display', 'none');
                    window.location.href = 'index.php';

                }
            }
        });
        e.preventDefault();
        return false;
    });

    $("#cancel_form").click(function () {
        window.location.href = 'index.php';
        return false;
    });


    $(document).on("submit", "#req_form", function(e){
        $.ajax({
            url: "processing.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            type: "POST",
            success: function (data) {
                var result = JSON.parse(data);
                if (result['errs']) {

                    window.location.href = 'index.php?page=list';
                }
            }
        });
        e.preventDefault();
        return false;
    });

    $(document).on("click", "#delete_request", function(){
        var data = "delete";
        var id = $(this).val();

        $.ajax({
            url: "processing.php",
            data: {
                action: data,
                id_delete: id
            },
            type: "POST",
            success: function (data){
                window.location.href='index.php?page=list';
            }
        })
    });

    $(document).on("click", "#update_request", function(){
        var data = "update";
        var id = $(this).val();

        $.ajax({
            url: "request_form.php",
            data:{
                id_update: id
            },
            type: "GET",
            success: function(data){
                window.location.href='index.php?page=request' +  id;
            }
        })
    });

    $("#cancel_update_form").click(function () {
        window.location.href = 'index.php?page=list';
        return false;
    });



    $("#logout").click(function(){
       var logout = $(this).val();

       $.ajax({
           url: "processing.php",
           data: "logout=" + logout,
           type: "POST",
           success: function (data){
               window.location.href = 'login.php';
           }
       })
    });

    $(document).on("submit", "#update_profile", function () {
        $.ajax({
            url: "processing.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            type: "POST",
            success: function (data) {
                var result = JSON.parse(data);
                if (result['errs']) {
                    window.location.href = 'index.php?page=profile';
                    // $("#continut").html(<?php $_GET['page']='list'; ?>);

                }
            }
        });
        return false;
    });

    var checkedColor = "";

    $(document).on("click", ".check", function(){
        $(".check").prop('checked', false);
        $(this).prop('checked',true);
        checkedColor = $(this).val();
    });

    $(document).on("submit", "#add_event", function(e){
       $.ajax ({
           url: "processing.php",
           data: new FormData(this),
           contentType: false,
           cache: false,
           processData: false,
           type: "POST",
           success: function(data){
               var result = JSON.parse(data);
               if (result['errs']){
                   window.location.href = 'index.php';
               }
           }
       });
        e.preventDefault();
        return false;
    });

    $("#calendar").click(function(){
        window.location.href = 'index.php?page=calendar';
        return false;
    });

    $("#list_of_benefits").click(function(){
        window.location.href = 'index.php?page=list_benefits';
        return false;
    });

    $("#select_benefits").click(function(){
        window.location.href = 'index.php?page=select_benefits';
        return false;
    });

    $("#add_benefit_btn").click(function(){
        window.location.href = 'index.php?page=add_benefit';
        return false;
    });

    $("#list_users").click(function(){
        window.location.href = 'index.php?page=users_list';
        return false;
    });

    $("#add_user").click(function(){
        window.location.href = 'index.php?page=add_user';
        return false;
    });

    $(document).on("click", "#delete_user", function(){
        var delete_user = "delete";
        var uid = $(this).val();

        $.ajax({
            url: "processing.php",
            data: {
                delete_user: delete_user,
                uid: uid
            },
            type: "POST",
            success: function (data){
                window.location.href='index.php?page=users_list';
            }
        })
    });

    // $(document).on("click", "#edit_user", function(){
    //     var edit_user = "edit";
    //     var uid = $(this).val();
    //
    //     $.ajax({
    //         url: "add_user.php",
    //         data:{
    //             edit_user: edit_user,
    //             uid: uid
    //         },
    //         type: "POST",
    //         success: function(data){
    //             window.location.href='index.php?page=add_user&edit_user=edit$uid=' + uid;
    //         }
    //     })
    // });

    $("#add_benefits").click(function(){
        var add_benefit = "add";
        var name = $("#name_of_benefit").val();
        var description = $("#description_of_benefit").val();
        $.ajax({
            url: "processing.php",
            data: {
                add_benefit: add_benefit,
                name: name,
                description: description,
                className: checkedColor
            },
            type: "POST",
            success: function(data){
                var result = JSON.parse(data);
                if (result['errs']){
                    window.location.href = 'index.php?page=list_benefits';
                }
            }
        })
     });

    $(document).on("submit", "#add_new_user",function(){
        $.ajax({
            url: "processing.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            type: "POST",
            success: function(data){
                var result = JSON.parse(data);
                if (result['errs']){
                    window.location.href = 'index.php?page=users_list';
                }
            }
        });
        return false;
    });

    $(document).on("submit", "#update_user_form",function(){
        $.ajax({
            url: "processing.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            type: "POST",
            success: function(data){
                var result = JSON.parse(data);
                if (result['errs']){
                    window.location.href = 'index.php?page=users_list';
                }
            }
        });
        return false;
    });

    $("#accepted").click(function(){
        var accepted = "ok";
        var id_req = $(this).val();
        $.ajax({
            url: "processing.php",
            data:{
                accepted: accepted,
                id_req: id_req
            },
            type: "POST",
            success: function(data){
                window.location.href = 'index.php?page=list';
            }
        });
        return false;
    });

    $("#declined").click(function(){
        var declined = "ok";
        var id_req = $(this).val();
        $.ajax({
            url: "processing.php",
            data:{
                declined: declined,
                id_req: id_req
            },
            type: "POST",
            success: function(data){
                window.location.href = 'index.php?page=list';
            }
        });
        return false;
    });

    $(document).on("submit", "#photo_change", function(e){
        $.ajax({
           url: "processing.php",
           data: new FormData(this),
            cache: false,
            contentType: false,
            processData: false,
           type: "POST",
           success: function(data){
               window.location.href = "index.php?page=profile";
           }
       });
        e.preventDefault();
        return false;
    });

});