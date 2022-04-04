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


function FirstLetterCapital(id) {
    var evt = $(id).val();
    // Get an array of all the words (in all lower case)
    var words = evt.toLowerCase().split(/\s+/g);
    
    // Loop through the array and replace the first letter with a cap
    var newWords = words.map(function(element){   
      // As long as we're not dealing with an empty array element, return the first letter
      // of the word, converted to upper case and add the rest of the letters from this word.
      // Return the final word to a new array
      return element !== "" ?  element[0].toUpperCase() + element.substr(1, element.length) : "";
    });
    
   // Replace the original value with the updated array of capitalized words.
   $(id).val(newWords.join(" ")); 
  }


  function NoSpecialCharandLowercase(id) {
        var evt = $(id).val();
        var words = evt.toLowerCase().replace(/[^a-zA-Z0-9 ]/g, "");
        $(id).val(words.replace(/ /g, "")); 
  }


  function OnlyNumber(id) {
        var evt = $(id).val();
        var words = evt.toLowerCase().replace(/[^0-9 ]/g, "");
        $(id).val(words.replace(/ /g, "")); 
  }

  function OnlyEmail(id) {
        var evt = $(id).val();
        var words = evt.toLowerCase().replace(/[^0-9 ]/g, "");
        $(id).val(words.replace(/ /g, "")); 
  }
