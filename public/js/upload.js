file_upload.onchange = evt => {
    const [file] = file_upload.files
    const img_cr = document.getElementById("unhide_container");
    const img_hi = document.getElementById("hide_container");
    const accept_btn = document.getElementById("acceptBtn");
    if (file) {
        accept_btn.disabled = false;
        accept_btn.classList.remove("not_allow");
        hide.src = URL.createObjectURL(file);
        img_cr.classList.add("hide");
        img_hi.classList.add("unhide");
    }
}

