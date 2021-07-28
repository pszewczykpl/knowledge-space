var quill = new Quill('#kt_forms_widget_1_editor', {
    modules: {
        toolbar: {
            container: "#kt_forms_widget_1_editor_toolbar"
        }
    },
    placeholder: "Wpisz treść aktualności!",
    theme:"snow"
});

$("#kt_forms_widget_1_form").on("submit",function(){
    $("#content").val(quill.root.innerHTML);
});