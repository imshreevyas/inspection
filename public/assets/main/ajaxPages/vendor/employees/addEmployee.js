
$("#addemployee").on("click", async function() {
    var url = `${base_url}/vendor/${vendorUsername}/dataInsertEmployee`;

    $('#addemployee').text('Creating Employee...');
    
    var name      = validateInput('#employeeName', 'Employee name', "#addemployee", 'Add Employee');
    var username  = validateInput('#username', 'Username', "#addemployee", 'Add Employee');
    var email     = validateInput('#employeeEmail','Employee Email', "#addemployee", 'Add Employee');
    var mobile    = validateInput('#employeeNumber','Employee Mobile number', "#addemployee", 'Add Employee');
    var role_id    = validateInput('#role_id','Role', "#addemployee", 'Add Employee');
    var pass      = validateInput('#password','Password', "#addemployee", 'Add Employee');
    var cpass     = validateInput('#confirmPass','Confirm Password', "#addemployee", 'Add Employee');


    if(pass != cpass){
        toastr.error('Password and Confirm Password Incorrect') //shows toaster of error 
        $('#addemployee').text('Add Employee');
        return false;
    }

    try {
        const params = new URLSearchParams();
        params.append('data[name]', name);
        params.append('data[username]', username);
        params.append('data[email]', email);
        params.append('data[mobile]', mobile);
        params.append('data[role_id]', role_id);
        params.append('data[pass]', pass);
        params.append('data[cpass]', cpass);
        

        const response = await axios
        .post(url, params)
        .then(function (response) {

            var status = response.data.status;
            var message = response.data.message;

            //  success response
            if (status == 200) {
                Object.keys(message).forEach(function (key) {
                    toastr.success(message[key]);
                });
                
                $('#addemployee').text('Add Employee');
                $('input[type=text]').val('');
                $('input[type=password]').val('');
            }

            // failed response
            else if (status == 401 || status == 405) {
                $('#addemployee').text('Add Employee');
                Object.keys(message).forEach(function (key) {
                    toastr.error(message[key]);
                });
            }
        })
        .catch(function (error) {
            toastr.error(error.message);
        });
    } 
    catch (error) {
        console.error(error);
        $('#addemployee').text('Add Employee');
        toastr.error('Something went Wrong, try again later') //shows toaster of error 
    }
});