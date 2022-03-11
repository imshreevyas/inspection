
$("#addvendor").on("click", async function() {

    $('#addvendor').text('Please Wait...');

    var cname          = validateInput('#companyName', 'Company name', "#addvendor", 'Add Vendor');
    var cusername            = validateInput('#username', 'Username', "#addvendor", 'Add Vendor');
    var cemail      = validateInput('#companyEmail','Company Email', "#addvendor", 'Add Vendor');
    var cnumber            = validateInput('#companyNumber','Company number', "#addvendor", 'Add Vendor');
    var pack_id            = validateInput('#package_id','Package', "#addvendor", 'Add Vendor');
    var pass            = validateInput('#password','Password', "#addvendor", 'Add Vendor');
    var cpass            = validateInput('#confirmPass','Confirm Password', "#addvendor", 'Add Vendor');

    var url = `${base_url}/mainAdmin/dataInsertVendor`;

    if(pass != cpass){
        toastr.error('Password and Confirm Password Incorrect') //shows toaster of error 
        $('#addvendor').text('Add Vendor');
        return false;
    }

    try {
        const params = new URLSearchParams();
        params.append('cname', cname);
        params.append('cusername', cusername);
        params.append('cemail', cemail);
        params.append('cnumber', cnumber);
        params.append('pack_id', pack_id);
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
                
                $('#addvendor').text('Add Vendor');
                $('input[type=text]').val('');
            }
            // failed response
            else if (status == 401 || status == 405) {
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
        toastr.error('Something went Wrong, try again later') //shows toaster of error 
    }
});