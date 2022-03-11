// take two parameter : 1. input id , 2. name to show error.
// add below style in main file
// .redBorder {
//     border: 1px solid red !important;
// }

toastr.options = {
    "closeButton": true,
    "debug": false,
    "newestOnTop": true,
    "progressBar": false,
    "positionClass": "toast-bottom-center",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}

function validateInput(input, feildName, btnID, btnText){

    $(input).removeClass('redBorder'); //removes alert of textbox with red border

    if($(input).val() == ''){

        toastr.error(`${feildName} Feilds Mandatory!`) //shows toaster of error 
        $(input).focus(); //keeps focus on text box
        $(input).addClass('redBorder'); //adds alert of textbox with red border
        changeBtnText(btnID,btnText);
        return false;
    }else{
        return $(input).val();
    }
    
}


let delay = 1000;
function showCheckBoxExplaination(id){
    $(`#${id}`).css('display','block');
    $(`#${id}`).addClass('highLightBorder');
    setTimeout(() => {
        $(`#${id}`).removeClass('highLightBorder');
    }, delay);
}

function changeBtnText(id,text){

}