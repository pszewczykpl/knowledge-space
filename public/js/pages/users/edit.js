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