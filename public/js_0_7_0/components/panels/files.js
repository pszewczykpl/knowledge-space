var show_draft_files = document.getElementById("show-draft-files");
if(!!show_draft_files) {
    show_draft_files.addEventListener('click', function () {
        var sdf = show_draft_files;
        if(sdf.getAttribute("name") == "non-active")
        {
            sdf.setAttribute("name","active");
            sdf.classList.add("active");

            var drafts = document.getElementsByName("draft");
            drafts.forEach( draft => {
                draft.style.cssText = 'display:flex !important';
            });
        }
        else if(sdf.getAttribute("name") == "active")
        {
            sdf.setAttribute("name","non-active");
            sdf.classList.remove("active");

            var drafts = document.getElementsByName("draft");
            drafts.forEach( draft => {
                draft.style.cssText = 'display:none !important';
            });
        }
    });
};