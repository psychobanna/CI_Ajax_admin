// Login
$("#loginform").submit(function(e){

    e.preventDefault();

    var data = $("#loginform").serialize();
    data = data+'&action=login';
    // console.log(data);
    
                $("#alerts").html("Loading...");
                $("#alerts").show();
        $.ajax({
            type: "POST",
            data: data,
            url: base_url+"panel/action",
            success :function(result){
                console.log(result);
                var data = JSON.parse(result);
                $("#alerts").show();
                $("#alerts").html(data.message);
                $("#alerts").removeClass("alert-danger");
                $("#alerts").removeClass("alert-success");
                $("#alerts").addClass("alert-"+data.alert);

                setInterval(function(){
                    if(data.message == "Welcome"){
                        window.location.href = base_url+"panel/";
                    }
                },1000);

            }
        })
      .done(function() {
        // console.log( "success" );
      })
      .fail(function() {
        console.log( "error" );
      });
    //   $("input").val("");
      return false;
    });

// Register
$("#registerform").submit(function(e){

    e.preventDefault();

    var data = $("#registerform").serialize();
    data = data+'&action=register';
    // console.log(data);
    
                $("#alerts").html("Loading...");
                $("#alerts").show();
        $.ajax({
            type: "POST",
            data: data,
            url: base_url+"panel/action",
            success :function(result){
                console.log(result);
                var data = JSON.parse(result);
                $("#alerts").show();
                $("#alerts").html(data.message);
                $("#alerts").removeClass("alert-danger");
                $("#alerts").removeClass("alert-success");
                $("#alerts").addClass("alert-"+data.alert);

                setInterval(function(){
                    if(data.message == "Sent confirmation email"){
                        window.location.href = base_url+"panel/";
                    }
                },1000);

            }
        })
      .done(function() {
        // console.log( "success" );
      })
      .fail(function() {
        console.log( "error" );
      });
    //   $("input").val("");
      return false;
    });


// Forgot Password
$("#forgotpasswordform").submit(function(e){

    e.preventDefault();

    var data = $("#forgotpasswordform").serialize();
    data = data+'&action=forgotpassword';
    // console.log(data);
    
                $("#alerts").html("Loading...");
                $("#alerts").show();
        $.ajax({
            type: "POST",
            data: data,
            url: base_url+"panel/action",
            success :function(result){
                console.log(result);
                var data = JSON.parse(result);
                $("#alerts").show();
                $("#alerts").html(data.message);
                $("#alerts").removeClass("alert-danger");
                $("#alerts").removeClass("alert-success");
                $("#alerts").addClass("alert-"+data.alert);

                setInterval(function(){
                    if(data.message == "Sent confirmation email"){
                        // window.location.href = base_url+"panel/";
                    }
                },1000);

            }
        })
      .done(function() {
        // console.log( "success" );
      })
      .fail(function() {
        console.log( "error" );
      });
    //   $("input").val("");
      return false;
    });


// Forgot Password
$("#addadminroleform").submit(function(e){

    e.preventDefault();

    var data = $("#addadminroleform").serialize();
    data = data+'&action=addadminrole';
    console.log(data);
    
                $("#alerts").html("Loading...");
                $("#alerts").show();
        $.ajax({
            type: "POST",
            data: data,
            url: base_url+"panel/action",
            success :function(result){
                console.log(result);
                var data = JSON.parse(result);
                $("#alerts").show();
                $("#alerts").html(data.message);
                $("#alerts").removeClass("alert-danger");
                $("#alerts").removeClass("alert-success");
                $("#alerts").addClass("alert-"+data.alert);
                setInterval(function(){
                    if(data.message == "Role added" || data.message == "Role updated"){
                        window.location.href = base_url+"panel/role";
                    }
                },1000);

            }
        })
      .done(function() {
        // console.log( "success" );
      })
      .fail(function() {
        console.log( "error" );
      });
    //   $("input").val("");
      return false;
    });



function adminrolestatus(i,q) {
    // body...
     event.preventDefault();

    data = 'action=adminrolestatus&i='+i+'&q='+q;    
        $("#alerts").html("Loading...");
        $("#alerts").show();
        $.ajax({
            type: "POST",
            data: data,
            url: base_url+"panel/action",
            success :function(result){
                console.log(result);
                var data = JSON.parse(result);
                $("#alerts").show();
                $("#alerts").html(data.message);
                $("#alerts").removeClass("alert-danger");
                $("#alerts").removeClass("alert-success");
                $("#alerts").addClass("alert-"+data.alert);
                setInterval(function(){
                    if(data.message == "Role status updated"){
                        window.location.href = base_url+"panel/role";
                    }
                },1000);

            }
        })
      .done(function() {
        // console.log( "success" );
      })
      .fail(function() {
        console.log( "error" );
      });
    //   $("input").val("");
      return false;
}

function showadminrole(i){
    // body...
     event.preventDefault();

    data = 'action=showadminrole&i='+i;    
        $.ajax({
            type: "POST",
            data: data,
            url: base_url+"panel/action",
            success :function(result){
                var data = JSON.parse(result);
                $("input[name='id']").val(data.aroleid);
                $("input[name='role']").val(data.arolename);
            }
        })
      .done(function() {
        // console.log( "success" );
      })
      .fail(function() {
        console.log( "error" );
      });
    //   $("input").val("");
      return false;
}

function singleroledelete(i){
    // body...
     event.preventDefault();

    data = 'action=singleroledelete&i='+i;    
        $.ajax({
            type: "POST",
            data: data,
            url: base_url+"panel/action",
            success :function(result){
                console.log(result);
                var data = JSON.parse(result);
                $("#alerts").show();
                $("#alerts").html(data.message);
                $("#alerts").removeClass("alert-danger");
                $("#alerts").removeClass("alert-success");
                $("#alerts").addClass("alert-"+data.alert);
                setInterval(function(){
                    if(data.message == "Single role Deleted"){
                        window.location.href = base_url+"panel/role";
                    }
                },1000);
            }
        })
      .done(function() {
        // console.log( "success" );
      })
      .fail(function() {
        console.log( "error" );
      });
    //   $("input").val("");
      return false;
}


function adminstatus(i,q){
// body...
    event.preventDefault();

    data = 'action=adminstatus&i='+i+'&q='+q;    
        $("#alerts").html("Loading...");
        $("#alerts").show();
        $.ajax({
            type: "POST",
            data: data,
            url: base_url+"panel/action",
            success :function(result){
                console.log(result);
                var data = JSON.parse(result);
                $("#alerts").show();
                $("#alerts").html(data.message);
                $("#alerts").removeClass("alert-danger");
                $("#alerts").removeClass("alert-success");
                $("#alerts").addClass("alert-"+data.alert);
                setInterval(function(){
                    if(data.message == "Role status updated"){
                        window.location.href = base_url+"panel/viewusers";
                    }
                },1000);

            }
        })
      .done(function() {
        // console.log( "success" );
      })
      .fail(function() {
        console.log( "error" );
      });
    //   $("input").val("");
      return false;
}

// updateuserform


// Forgot Password
$("#updateuserform").submit(function(e){

    e.preventDefault();
    var data = new FormData(this);
    data.append ('action', 'updateuserform');    
    $("#alerts").html("Loading...");
    $("#alerts").show();
        $.ajax({
            type: "POST",
            data: data,
            url: base_url+"panel/action",
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success :function(result){
                console.log(result);
                var data = JSON.parse(result);
                $("#alerts").show();
                $("#alerts").html(data.message);
                $("#alerts").removeClass("alert-danger");
                $("#alerts").removeClass("alert-success");
                $("#alerts").addClass("alert-"+data.alert);
                setInterval(function(){
                    if(data.message == "User details updated"){
                        window.location.href = base_url+"panel/viewusers";
                    }
                },1000);

            }
        })
      .done(function() {
        // console.log( "success" );
      })
      .fail(function() {
        console.log( "error" );
      });
    //   $("input").val("");
      return false;
    });

// changepasswordform
$("#changepasswordform").submit(function(e){

    e.preventDefault();
    var data = new FormData(this);
    data.append ('action', 'changepasswordform');    
    $("#alerts").html("Loading...");
    $("#alerts").show();
        $.ajax({
            type: "POST",
            data: data,
            url: base_url+"panel/action",
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success :function(result){
                console.log(result);
                var data = JSON.parse(result);
                $("#alerts").show();
                $("#alerts").html(data.message);
                $("#alerts").removeClass("alert-danger");
                $("#alerts").removeClass("alert-success");
                $("#alerts").addClass("alert-"+data.alert);
                setInterval(function(){
                    if(data.message == "Password changed"){
                        window.location.href = base_url+"panel/viewusers/";
                    }
                },1000);

            }
        })
      .done(function() {
        // console.log( "success" );
      })
      .fail(function() {
        console.log( "error" );
      });
    //   $("input").val("");
      return false;
    });


// Multiuserdelete
$("#alldeleteuser").submit(function(e){

    e.preventDefault();
    var data = new FormData(this);
    data.append ('action', 'alldeleteuser');    
    $("#alerts").html("Loading...");
    $("#alerts").show();
        $.ajax({
            type: "POST",
            data: data,
            url: base_url+"panel/action",
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success :function(result){
                console.log(result);
                var data = JSON.parse(result);
                $("#alerts").show();
                $("#alerts").html(data.message);
                $("#alerts").removeClass("alert-danger");
                $("#alerts").removeClass("alert-success");
                $("#alerts").addClass("alert-"+data.alert);
                setInterval(function(){
                    if(data.message == "Users deteted"){
                        window.location.href = base_url+"panel/viewusers";
                    }
                },1000);

            }
        })
      .done(function() {
        // console.log( "success" );
      })
      .fail(function() {
        console.log( "error" );
      });
    //   $("input").val("");
      return false;
    });


// Multiroledelete
$("#alldeleterole").submit(function(e){

    e.preventDefault();
    var data = new FormData(this);
    data.append ('action', 'alldeleterole');    
    $("#alerts").html("Loading...");
    $("#alerts").show();
        $.ajax({
            type: "POST",
            data: data,
            url: base_url+"panel/action",
            processData:false,
            contentType:false,
            cache:false,
            async:false,
            success :function(result){
                console.log(result);
                var data = JSON.parse(result);
                $("#alerts").show();
                $("#alerts").html(data.message);
                $("#alerts").removeClass("alert-danger");
                $("#alerts").removeClass("alert-success");
                $("#alerts").addClass("alert-"+data.alert);
                setInterval(function(){
                    if(data.message == "Users deteted"){
                        window.location.href = base_url+"panel/role";
                    }
                },1000);

            }
        })
      .done(function() {
        // console.log( "success" );
      })
      .fail(function() {
        console.log( "error" );
      });
    //   $("input").val("");
      return false;
    });



// JavaScript
$("img#showimg").click(function(){
    $("input#exampleInputRole[type='file']").click();
});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#showimg').show();
            $('#showimg')
                .attr('src', e.target.result)
                .width(200)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
