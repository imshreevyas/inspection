

function showPassword(){
    var x = document.getElementById("userpassword");
    if (x.type === "password") {
        x.type = "text";
        $('#passIcon').removeClass('ri-eye-close-fill');
        $('#passIcon').addClass('ri-eye-fill');
    } else {
        x.type = "password";
        $('#passIcon').removeClass('ri-eye-fill');
        $('#passIcon').addClass('ri-eye-close-fill');
    }
}

async function submitDetails(){
    
    var username = validateInput('#username', 'Username');
    var password = validateInput('#userpassword', 'Password');
    var url = `${base_url}/vendor/${vendorUsername}/checkLogin` ;


    var loginType = document.querySelector('input[name="loginType"]:checked');
    loginType = loginType.value;

    const params = new URLSearchParams();
    params.append("username", username);
    params.append("password", password);
    params.append("loginType", loginType);

    const response = await axios
    .post(url, params)
    .then(function (response) {
        var status = response.data.status;
        var message = response.data.message;

        //  success response
        if (status == 200) {

            $(".loginbtn").remove();
            Object.keys(message).forEach(function (key) {
                toastr.success(message[key]);
            });
            
            setTimeout(function () {
                window.location.href = `${base_url}/vendor/${vendorUsername}/dashboard`;
            }, 500);

        }
        // failed response
        else if (status == 401 || status == 405) {

            $(".loginbtn").html("Sign In");
            Object.keys(message).forEach(function (key) {
                toastr.error(message[key]);
            });
        }
    })
    .catch(function (error) {
        toastr.error(error.message);
    });

}


