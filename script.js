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