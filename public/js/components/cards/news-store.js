"use strict";

var KTWidgets = function() {

    var _initFormsWidget2 = function() {
        var formEl = KTUtil.getById("kt_forms_widget_2_form");
        var editorId = 'editor';

        // init editor
        var options = {
            modules: {
                toolbar: {
                    container: "#kt_forms_widget_2_editor_toolbar"
                }
            },
            placeholder: 'Wprowadź tekst aktualności...',
            theme: 'snow'
        };

        if (!formEl) {
            return;
        }

        var editorObj = new Quill('#' + editorId, options);

        $("#kt_forms_widget_2_form").on("submit",function(){
            $("#content").val(editorObj.root.innerHTML);
        })
    }

    return {
        init: function() {
            _initFormsWidget2();
        }
    }
}();

jQuery(document).ready(function() {
    KTWidgets.init();
});