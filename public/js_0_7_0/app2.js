toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": true,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "2000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
};

$("#search_box_panel_button").click(function() {
    var search_box_panel = document.getElementById("search_box_panel");

    if ($(this).hasClass('active')) {
        search_box_panel.style.display = 'none';

        $(this).removeClass('active');
        $(this).blur();
        $(this).html('Pokaż Wyszukiwanie Zaawansowane');
    }
    else {
        search_box_panel.style.display = 'flex';

        $(this).addClass('active');
        $(this).blur();
        $(this).html('Ukryj Wyszukiwanie Zaawansowane');
    }
});

$(".datepicker").daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    locale: {
        format: "YYYY-MM-DD"
    }
});