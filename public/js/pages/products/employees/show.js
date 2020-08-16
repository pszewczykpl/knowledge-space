function ShareEmployees(id) {
    const el = document.createElement('textarea');
    el.value = HOST_URL + '/employees/' + id;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
  
    $.notify({
          message: 'Skopiowano link do schowka!',
      },{
          type: 'primary',
          allow_dismiss: false,
          newest_on_top: true
      });
  };

function ShareFiles(id) {
  const el = document.createElement('textarea');
  el.value = HOST_URL + '/files/' + id;
  document.body.appendChild(el);
  el.select();
  document.execCommand('copy');
  document.body.removeChild(el);

  $.notify({
        message: 'Skopiowano do schowka!',
    },{
        type: 'primary',
        allow_dismiss: false,
        newest_on_top: true
    });
};

var show_doc_files = document.getElementById("show-doc-files");
if(!!show_doc_files) {
    show_doc_files.addEventListener('click', function () {
        var sdf = show_doc_files;
        if(sdf.getAttribute("name") == "non-active")
        {
            sdf.setAttribute("name","active");
            sdf.classList.add("active");

            var docs = document.getElementsByName("doc");
            docs.forEach( doc => {
                doc.style.cssText = 'display:flex !important';
            });
        }
        else if(sdf.getAttribute("name") == "active")
        {
            sdf.setAttribute("name","non-active");
            sdf.classList.remove("active");

            var docs = document.getElementsByName("doc");
            docs.forEach( doc => {
                doc.style.cssText = 'display:none !important';
            });
        }
    });
};
var show_docx_files = document.getElementById("show-docx-files");
if(!!show_docx_files) {
    show_docx_files.addEventListener('click', function () {
        var sdf = show_docx_files;
        if(sdf.getAttribute("name") == "non-active")
        {
            sdf.setAttribute("name","active");
            sdf.classList.add("active");

            var docxs = document.getElementsByName("docx");
            docxs.forEach( docx => {
                docx.style.cssText = 'display:flex !important';
            });
        }
        else if(sdf.getAttribute("name") == "active")
        {
            sdf.setAttribute("name","non-active");
            sdf.classList.remove("active");

            var docxs = document.getElementsByName("docx");
            docxs.forEach( docx => {
                docx.style.cssText = 'display:none !important';
            });
        }
    });
};
var show_pub_files = document.getElementById("show-pub-files");
if(!!show_pub_files) {
    show_pub_files.addEventListener('click', function () {
        var sdf = show_pub_files;
        if(sdf.getAttribute("name") == "non-active")
        {
            sdf.setAttribute("name","active");
            sdf.classList.add("active");

            var pubs = document.getElementsByName("pub");
            pubs.forEach( pub => {
                pub.style.cssText = 'display:flex !important';
            });
        }
        else if(sdf.getAttribute("name") == "active")
        {
            sdf.setAttribute("name","non-active");
            sdf.classList.remove("active");

            var pubs = document.getElementsByName("pub");
            pubs.forEach( pub => {
                pub.style.cssText = 'display:none !important';
            });
        }
    });
};
var show_pptx_files = document.getElementById("show-pptx-files");
if(!!show_pptx_files) {
    show_pptx_files.addEventListener('click', function () {
        var sdf = show_pptx_files;
        if(sdf.getAttribute("name") == "non-active")
        {
            sdf.setAttribute("name","active");
            sdf.classList.add("active");

            var pptxs = document.getElementsByName("pptx");
            pptxs.forEach( pptx => {
                pptx.style.cssText = 'display:flex !important';
            });
        }
        else if(sdf.getAttribute("name") == "active")
        {
            sdf.setAttribute("name","non-active");
            sdf.classList.remove("active");

            var pptxs = document.getElementsByName("pptx");
            pptxs.forEach( pptx => {
                pptx.style.cssText = 'display:none !important';
            });
        }
    });
};
var show_xlsx_files = document.getElementById("show-xlsx-files");
if(!!show_xlsx_files) {
    show_xlsx_files.addEventListener('click', function () {
        var sdf = show_xlsx_files;
        if(sdf.getAttribute("name") == "non-active")
        {
            sdf.setAttribute("name","active");
            sdf.classList.add("active");

            var xlsxs = document.getElementsByName("xlsx");
            xlsxs.forEach( xlsx => {
                xlsx.style.cssText = 'display:flex !important';
            });
        }
        else if(sdf.getAttribute("name") == "active")
        {
            sdf.setAttribute("name","non-active");
            sdf.classList.remove("active");

            var xlsxs = document.getElementsByName("xlsx");
            xlsxs.forEach( xlsx => {
                xlsx.style.cssText = 'display:none !important';
            });
        }
    });
};