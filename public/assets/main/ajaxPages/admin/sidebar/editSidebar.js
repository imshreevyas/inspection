
$("#editsidebar").on("click", async function() {

    $('#editsidebar').text('Please Wait...');
    var parent          = validateInput('#parent', 'Parent Label', "#editsidebar", 'Edit Sidebar');
    var name            = validateInput('#name', 'Sidebar Name', "#editsidebar", 'Edit Sidebar');
    var sidebar_url     = validateInput('#url','Sidebar Url', "#editsidebar", 'Edit Sidebar');
    var icon            = validateInput('#icon','Sidebar Icon', "#editsidebar", 'Edit Sidebar');
    var add             = document.getElementById("add").checked ? '1' : '0';
    var view            = document.getElementById("view").checked ? '1' : '0';
    var edit            = document.getElementById("edit").checked ? '1' : '0';
    var update_status   = document.getElementById("update_status").checked ? '1' : '0';
    var panel_type      = validateInput('#panel_type','Panel Type', "#editsidebar", 'Edit Sidebar');
    var btnVal          = validateInput('#editsidebar','', "#editsidebar", 'Edit Sidebar');

    var url = `${base_url}/mainAdmin/dataUpdateSidebar`;

    if(add == 0 && view == 0 && edit == 0 && update_status == 0){
        toastr.error('One Access is Mandatory') //shows toaster of error 
        $('#editsidebar').text('Edit Sidebar');
        return false;
    }

    try {
        const params = new URLSearchParams();
        params.append('data[parent_name]', parent);
        params.append('data[sidebar_name]', name);
        params.append('data[sidebar_url]', sidebar_url);
        params.append('data[sidebar_icon]', icon);
        params.append('data[add_access]', add);
        params.append('data[edit_access]', edit);
        params.append('data[view_access]', view);
        params.append('data[update_access]', update_status);
        params.append('data[panel_type]', panel_type);
        params.append('where[id]', btnVal);

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
                
                $('#editsidebar').text('Edit Sidebar');
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