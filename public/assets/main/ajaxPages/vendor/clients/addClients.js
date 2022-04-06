
$("#addclient").on("click", async function() {

    var url = `${base_url}/vendor/${vendorUsername}/dataInsertClient`;
    $('#addclient').text('Creating Client...');
    
    var name      = validateInput('#clientName', 'Client name', "#addclient", 'Add Client');
    var email     = validateInput('#clientEmail','Client Email', "#addclient", 'Add Client');
    var mobile    = validateInput('#clientNumber','Client Mobile number', "#addclient", 'Add Client');
    var address   = validateInput('#address', 'Address', "#addclient", 'Add Client');
    
    try {
        const params = new URLSearchParams();
        params.append('data[name]', name);
        params.append('data[email]', email);
        params.append('data[mobile]', mobile);
        params.append('data[address]', address);
        
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
                
                $('#addclient').text('Add Client');
                $('input[type=text]').val('');
            }

            // failed response
            else if (status == 401 || status == 405) {
                $('#addclient').text('Add Client');
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
        $('#addclient').text('Add Client');
        toastr.error('Something went Wrong, try again later') //shows toaster of error 
    }
});