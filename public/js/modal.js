// Avatar-Modal
var modal = document.getElementById("avatar-Modal");
var btn = document.getElementById("update_avatar");
var span = document.getElementsByClassName("close")[0];
btn.onclick = function () {
  modal.style.display = "block";
}

var closeBtn = document.getElementsByClassName("close_btn")[0];

closeBtn.onclick = function () {
  modal.style.display = "none";
}


// MODAL IMAGE //

// Get the modal current
var modal_img = document.getElementById("myModal_current");

// Get the image and insert it inside the modal_img - use its "alt" text as a caption
var img = document.getElementById("current");
var modalImg = document.getElementById("img01");
img.onclick = function () {
  modal_img.style.display = "block";
  modalImg.src = this.src;
}

// Get the modal replace
var modal_img = document.getElementById("myModal_hide");

// Get the image and insert it inside the modal_img - use its "alt" text as a caption
var img = document.getElementById("hide");
var modalImg = document.getElementById("img02");
img.onclick = function () {
  modal_img.style.display = "block";
  modalImg.src = this.src;
}

var span = document.getElementById("xyz");
// When the user clicks on <span> (x), close the modal
span.onclick = function () {
  modal_img.style.display = "none";
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
  if (event.target == modal_img) {
    modal_img.style.display = "none";
  }
  if (event.target == modal) {
    modal.style.display = "none";
  }
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
        document.getElementById("pla-dropbtn2").classList.toggle("hide");
      }
    }
  }
  
  if (!event.target.matches('.vid_sort')) {
    var dropdowns = document.getElementsByClassName("vid_sort-dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');

      }
    }
  }
  if (!event.target.matches('.bx-dots-vertical-rounded')) {
    var fea_dropdown = document.getElementsByClassName("fea-dropdown");
    var j;
    for (j = 0; j < fea_dropdown.length; j++) {
      var openDropdown2 = fea_dropdown[j];
      if (openDropdown2.classList.contains('visible')) {
        openDropdown2.classList.remove('visible');
        openDropdown2.classList.add('hidden');
      }
    }
    var x = document.getElementsByClassName('fea-video-options');
    var i;
    for (i = 0; i < x.length; i++) {
      var removeDot = x[i];
      if (removeDot.classList.contains('noHover')) {
        removeDot.classList.remove('noHover');
      }
    }
    var y = document.getElementsByClassName('vid-video-options');
    var j;
    for (j = 0; j < y.length; j++) {
      var removeDot = y[j];
      if (removeDot.classList.contains('noHover')) {
        removeDot.classList.remove('noHover');
      }
    }
  }
  
}

//VideoUpload-Modal

