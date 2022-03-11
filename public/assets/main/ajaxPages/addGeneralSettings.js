$("#addsetting").on("click", async function() {

    $('#addsetting').text('Please Wait...');
    var name          = validateInput('#name', 'Name', "#addsetting", 'Add Setting');
    var value            = validateInput('#value', 'Value', "#addsetting", 'Add Setting');
    var description     = validateInput('#description','Description', "#addsetting", 'Add Setting');
    var url = `${base_url}/mainAdmin/dataInsertGeneralSettings`;

    try {
        const params = new URLSearchParams();
        params.append('name', name);
        params.append('value', value);
        params.append('description', description);

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
                
                $('#addsetting').text('Add Setting');
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
        toastr.error('Something went Wrong, try again later') //shows toaster of error 
    }
});