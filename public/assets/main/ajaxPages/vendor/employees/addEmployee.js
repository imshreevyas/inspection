
$("#addemployee").on("click", async function() {
    var url = `${base_url}/vendor/${username}/dataInsertEmployee`;

    $('#addemployee').text('Please Wait...');
    
    var name      = validateInput('#employeeName', 'Employee name', "#addvendor", 'Add Vendor');
    var username  = validateInput('#username', 'Username', "#addvendor", 'Add Vendor');
    var email     = validateInput('#employeeEmail','Employee Email', "#addvendor", 'Add Vendor');
    var number    = validateInput('#employeeNumber','Employee Mobile number', "#addvendor", 'Add Vendor');
    var roleId    = validateInput('#role_id','Role', "#addvendor", 'Add Vendor');
    var pass       = validateInput('#password','Password', "#addvendor", 'Add Vendor');
    var cpass      = validateInput('#confirmPass','Confirm Password', "#addvendor", 'Add Vendor');


    if(pass != cpass){
        toastr.error('Password and Confirm Password Incorrect') //shows toaster of error 
        $('#addemployee').text('Add Vendor');
        return false;
    }

    try {
        const params = new URLSearchParams();
        params.append('name', name);
        params.append('username', username);
        params.append('email', email);
        params.append('number', number);
        params.append('roleId', roleId);
        params.append('pass', pass);

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