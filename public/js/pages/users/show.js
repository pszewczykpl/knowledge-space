"use strict";

var BootstrapSelect = function () {

    var arrows = {
        leftArrow: '<i class="la la-angle-left"></i>',
        rightArrow: '<i class="la la-angle-right"></i>'
    }

    var edit = function () {
        $('.selectpicker').selectpicker();

        $('.datepicker').datepicker({
            todayHighlight: true,
            orientation: "bottom left",
            templates: arrows,
            format: 'yyyy-mm-dd'
           });
    }

    return {
        init: function() {
            edit();
        }
    };
}();

jQuery(document).ready(function() {
    BootstrapSelect.init();
});


var KTAppsEducationStudentProfile = function () {
	var avatar;

	var initAvatar = function() {
		avatar = new KTImageInput('kt_user_avatar');
	}

	return {
		init: function() {
			initAvatar();
		}
	};
}();

jQuery(document).ready(function() {
	KTAppsEducationStudentProfile.init();
});

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