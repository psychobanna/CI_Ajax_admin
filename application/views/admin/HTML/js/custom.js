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

