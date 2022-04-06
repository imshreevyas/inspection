
$("#updateemployee").on("click", async function() {

    var btnVal     = validateInput('#updateemployee','User', "#updateemployee", 'Edit Employee');
    var url = `${base_url}/vendor/${vendorUsername}/dataUpdateEmployee/${btnVal}`;

    $('#updateemployee').text('Updating Employee...');
    
    var name      = validateInput('#employeeName', 'Employee name', "#updateemployee", 'Edit Employee');
    var username  = validateInput('#username', 'Username', "#updateemployee", 'Edit Employee');
    var email     = validateInput('#employeeEmail','Employee Email', "#updateemployee", 'Edit Employee');
    var mobile    = validateInput('#employeeNumber','Employee Mobile number', "#updateemployee", 'Edit Employee');
    var role_id   = validateInput('#role_id','Role', "#updateemployee", 'Edit Employee');


    var pass = $('#password').val();
    if(pass){
        pass  = validateInput('#password','Password', "#addemployee", 'Add Employee')
    }

    try {
        const params = new URLSearchParams();
        params.append('data[name]', name);
        params.append('data[username]', username);
        params.append('data[email]', email);
        params.append('data[mobile]', mobile);
        params.append('data[role_id]', role_id);
        params.append('data[pass]', pass);
        params.append('where[id]', btnVal);
        
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
                
                $('#updateemployee').text('Edit Employee');
            }

            // failed response
            else if (status == 401 || status == 405) {
                $('#updateemployee').text('Edit Employee');
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
        $('#updateemployee').text('Edit Employee');
        toastr.error('Something went Wrong, try again later') //shows toaster of error 
    }
});