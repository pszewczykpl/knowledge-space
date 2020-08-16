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
                doc.style.display = 'flex';
            });
        }
        else if(sdf.getAttribute("name") == "active")
        {
            sdf.setAttribute("name","non-active");
            sdf.classList.remove("active");

            var docs = document.getElementsByName("doc");
            docs.forEach( doc => {
                doc.style.display = 'none';
            });
        }
    });
}
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
                docx.style.display = 'flex';
            });
        }
        else if(sdf.getAttribute("name") == "active")
        {
            sdf.setAttribute("name","non-active");
            sdf.classList.remove("active");

            var docxs = document.getElementsByName("docx");
            docxs.forEach( docx => {
                docx.style.display = 'none';
            });
        }
    });
}
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
                pub.style.display = 'flex';
            });
        }
        else if(sdf.getAttribute("name") == "active")
        {
            sdf.setAttribute("name","non-active");
            sdf.classList.remove("active");

            var pubs = document.getElementsByName("pub");
            pubs.forEach( pub => {
                pub.style.display = 'none';
            });
        }
    });
}
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
                pptx.style.display = 'flex';
            });
        }
        else if(sdf.getAttribute("name") == "active")
        {
            sdf.setAttribute("name","non-active");
            sdf.classList.remove("active");

            var pptxs = document.getElementsByName("pptx");
            pptxs.forEach( pptx => {
                pptx.style.display = 'none';
            });
        }
    });
}
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
                xlsx.style.display = 'flex';
            });
        }
        else if(sdf.getAttribute("name") == "active")
        {
            sdf.setAttribute("name","non-active");
            sdf.classList.remove("active");

            var xlsxs = document.getElementsByName("xlsx");
            xlsxs.forEach( xlsx => {
                xlsx.style.display = 'none';
            });
        }
    });
}