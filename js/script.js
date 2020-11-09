$(document).ready(function(){

  $("#dob").change(function(){
     var value = $("#dob").val();
      var dob = new Date(value);
      var today = new Date();
      var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
      if(isNaN(age)) {
      // will set 0 when value will be NaN
       age=0;
      }
      else{
        age=age;
      }
      $('#age').val(age);
  });
});

function triggerClickId(e) {
  document.querySelector('#id_image').click();
}

function updatedImageId(e) {
  if (e.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e){
      document.querySelector('#idImageUpdate').setAttribute('src', e.target.result);
    }
    reader.readAsDataURL(e.files[0]);
  }
}


function triggerClick(e) {
    document.querySelector('#image').click();
  }

  function updatedImage(e) {
    if (e.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        document.querySelector('#imageUpdate').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
    }
  }