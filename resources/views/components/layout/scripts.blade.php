<script>var HOST_URL = @php echo '"' . url('/') . '"'; @endphp;</script>
<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script>
<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script>function dateDiffMonth(e,t){e=e.split("-");var a,i,r=new Date(t),n=r.getFullYear(),d=r.getMonth()+1,l=r.getDate(),o=parseInt(e[0]),y=parseInt(e[1]),s=parseInt(e[2]);return i=d-y,l<s&&(i-=1),a=n-o,100*d+l<100*y+s&&(a-=1,i+=12),Math.floor((r.getTime()-new Date(o+a,y+i-1,s).getTime())/864e5),i}function dateDiffYear(e,t){e=e.split("-");var a,i,r=new Date(t),n=r.getFullYear(),d=r.getMonth()+1,l=r.getDate(),o=parseInt(e[0]),y=parseInt(e[1]),s=parseInt(e[2]);return i=d-y,l<s&&(i-=1),a=n-o,100*d+l<100*y+s&&(a-=1,i+=12),Math.floor((r.getTime()-new Date(o+a,y+i-1,s).getTime())/864e5),a}function policyCalcFunc(){dt1=document.getElementById("MyDate").value,dt2=document.getElementById("MyDateEnd").value,document.getElementById("miesiac").innerHTML=12*dateDiffYear(dt1,dt2)+dateDiffMonth(dt1,dt2)+1,document.getElementById("rok").innerHTML=dateDiffYear(dt1,dt2)+1}$.fn.datepicker.dates.en={days:["Niedziela","Poniedziałek","Wtorek","Środa","Czwartek","Piątek","Sobota"],daysShort:["Nd","Pon","Wt","Śr","Czw","Pt","Sb"],daysMin:["Nd","Pn","Wt","Śr","Cz","Pt","Sb"],months:["Styczeń","Luty","Marzec","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Październik","Listopad","Grudzień"],monthsShort:["Sty.","Lut.","Marz.","Kwie.","Maj","Czerw.","Lip.","Sier.","Wrze.","Paź.","Lis.","Gru."],today:"Dziś",clear:"Wyczyść",format:"yyyy-mm-dd",titleFormat:"MM yyyy",weekStart:1},$("#MyDate").datepicker({todayBtn:"linked",clearBtn:!0,todayHighlight:!0,templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}}),$("#MyDateEnd").datepicker({todayBtn:"linked",clearBtn:!0,todayHighlight:!0,templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}});</script>
@if (Session::has('notify_success'))
<script>
$.notify({
	message: '{{ Session::get('notify_success') }}',
},{
	type: 'success',
	allow_dismiss: false,
	newest_on_top: true
});
</script>
@endif
@if (Session::has('notify_danger'))
<script>
$.notify({
	message: '{{ Session::get('notify_danger') }}',
},{
	type: 'danger',
	allow_dismiss: false,
	newest_on_top: true
});
</script>
@endif