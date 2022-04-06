
$("#updateClient").on("click", async function() {

    var btnVal     = validateInput('#updateClient','User', "#updateClient", 'Edit Employee');
    var url = `${base_url}/vendor/${vendorUsername}/dataUpdateClient/${btnVal}`;
    $('#updateClient').text('Updating Client...');
    
    var name      = validateInput('#clientName', 'Client name', "#updateClient", 'Edit Client');
    var email     = validateInput('#clientEmail','Client Email', "#updateClient", 'Edit Client');
    var mobile    = validateInput('#clientNumber','Client Mobile number', "#updateClient", 'Edit Client');
    var address   = validateInput('#address', 'Address', "#updateClient", 'Edit Client');

    try {
        const params = new URLSearchParams();
        params.append('data[name]', name);
        params.append('data[email]', email);
        params.append('data[mobile]', mobile);
        params.append('data[address]', address);
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
                $('#updateClient').text('Edit Client');
            }

            // failed response
            else if (status == 401 || status == 405) {
                $('#updateClient').text('Edit Client');
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
        $('#updateClient').text('Add Client');
        toastr.error('Something went Wrong, try again later') //shows toaster of error 
    }
});