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

function dateDiffMonth(e,t){e=e.split("-");var a,i,r=new Date(t),n=r.getFullYear(),d=r.getMonth()+1,l=r.getDate(),o=parseInt(e[0]),y=parseInt(e[1]),s=parseInt(e[2]);return i=d-y,l<s&&(i-=1),a=n-o,100*d+l<100*y+s&&(a-=1,i+=12),Math.floor((r.getTime()-new Date(o+a,y+i-1,s).getTime())/864e5),i}function dateDiffYear(e,t){e=e.split("-");var a,i,r=new Date(t),n=r.getFullYear(),d=r.getMonth()+1,l=r.getDate(),o=parseInt(e[0]),y=parseInt(e[1]),s=parseInt(e[2]);return i=d-y,l<s&&(i-=1),a=n-o,100*d+l<100*y+s&&(a-=1,i+=12),Math.floor((r.getTime()-new Date(o+a,y+i-1,s).getTime())/864e5),a}function policyCalcFunc(){dt1=document.getElementById("MyDate").value,dt2=document.getElementById("MyDateEnd").value,document.getElementById("miesiac").innerHTML=12*dateDiffYear(dt1,dt2)+dateDiffMonth(dt1,dt2)+1,document.getElementById("rok").innerHTML=dateDiffYear(dt1,dt2)+1}$.fn.datepicker.dates.en={days:["Niedziela","Poniedziałek","Wtorek","Środa","Czwartek","Piątek","Sobota"],daysShort:["Nd","Pon","Wt","Śr","Czw","Pt","Sb"],daysMin:["Nd","Pn","Wt","Śr","Cz","Pt","Sb"],months:["Styczeń","Luty","Marzec","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Październik","Listopad","Grudzień"],monthsShort:["Sty.","Lut.","Marz.","Kwie.","Maj","Czerw.","Lip.","Sier.","Wrze.","Paź.","Lis.","Gru."],today:"Dziś",clear:"Wyczyść",format:"yyyy-mm-dd",titleFormat:"MM yyyy",weekStart:1},$("#MyDate").datepicker({todayBtn:"linked",clearBtn:!0,todayHighlight:!0,templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}}),$("#MyDateEnd").datepicker({todayBtn:"linked",clearBtn:!0,todayHighlight:!0,templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}});