
$("#addsidebar").on("click", async function() {

    $('#addsidebar').text('Please Wait...');
    var parent          = validateInput('#parent', 'Parent Label', "#addsidebar", 'Add Sidebar');
    var name            = validateInput('#name', 'Sidebar Name', "#addsidebar", 'Add Sidebar');
    var sidebar_url     = validateInput('#url','Sidebar Url', "#addsidebar", 'Add Sidebar');
    var icon            = validateInput('#icon','Sidebar Icon', "#addsidebar", 'Add Sidebar');
    var add             = document.getElementById("add").checked ? '1' : '0';
    var view            = document.getElementById("view").checked ? '1' : '0';
    var edit            = document.getElementById("edit").checked ? '1' : '0';
    var update_status   = document.getElementById("update_status").checked ? '1' : '0';

    var url = `${base_url}/mainAdmin/dataInsertSidebar`;

    if(add == 0 && view == 0 && edit == 0 && update_status == 0){
        toastr.error('One Access is Mandatory') //shows toaster of error 
        $('#addsidebar').text('Add Sidebar');
        return false;
    }

    try {
        const params = new URLSearchParams();
        params.append('parent', parent);
        params.append('name', name);
        params.append('url', sidebar_url);
        params.append('icon', icon);
        params.append('add', add);
        params.append('view', view);
        params.append('edit', edit);
        params.append('update_status', update_status);


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
                
                $('#addsidebar').text('Add Sidebar');
                $('input[type=checkbox]').prop('checked', false);
                $('input[type=text]').val('');
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
    catch (error) {
        console.error(error);
        toastr.error('Something went Wrong, try again later') //shows toaster of error 
    }
});