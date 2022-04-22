$('#clients').change(function () {
    var value = $('#clients').val();
    if(value == -1){
        $('#assetOtherClientDiv').removeClass('d-none');
    }else{
        if(!$('#assetOtherClientDiv').hasClass('d-none')){
            $('#assetOtherClient').val('');
            $('#assetOtherClientDiv').addClass('d-none')
        }
    }
});


$("#addasset").on("click", async function() {

    var url = `${base_url}/vendor/${vendorUsername}/dataInsertAsset`;
    $('#addasset').text('Adding Asset...');
    
    var name      = validateInput('#assetName', 'Asset Name', "#addasset", 'Add Asset');
    var code     = validateInput('#assetCode','Asset Code', "#addasset", 'Add Asset');
    var client_id    = validateInput('#clients','Client Name', "#addasset", 'Add Asset');
    var client_otherName  = '';
    
    if(client_id == -1){
        var client_otherName   = validateInput('#assetOtherClient', 'Another Client Name', "#addasset", 'Add Asset');
    }
    
    try {
        const params = new URLSearchParams();
        params.append('data[name]', name);
        params.append('data[product_code]', code);
        params.append('data[client_id]', client_id);
        params.append('data[client_otherName]', client_otherName);
        
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
                $('#addasset').text('Add Asset');
                $('input[type=text]').val('');
            }

            // failed response
            else if (status == 401 || status == 405) {
                $('#addasset').text('Add Asset');
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
        $('#addasset').text('Add Asset');
        toastr.error('Something went Wrong, try again later') //shows toaster of error 
    }
});