<script> var HOST_URL = @php echo '"' . url('/') . '"'; @endphp; </script>
<script> var PERMISSIONS = @auth {!! json_encode(cache()->remember('users_'.auth()->id().'_permissions_all', 900, function () { return auth()->user()->permissions()->get()->pluck('code')->toArray(); })) !!} @else []  @endauth; </script>
<script src="{{ asset('js_' . str_replace('.', '_', config('app.version')) . '/app.js') }}"></script>
<script src="{{ asset('js_' . str_replace('.', '_', config('app.version')) . '/app2.js') }}"></script>
<script>function dateDiffMonth(e,t){e=e.split("-");var a,i,r=new Date(t),n=r.getFullYear(),d=r.getMonth()+1,l=r.getDate(),o=parseInt(e[0]),y=parseInt(e[1]),s=parseInt(e[2]);return i=d-y,l<s&&(i-=1),a=n-o,100*d+l<100*y+s&&(a-=1,i+=12),Math.floor((r.getTime()-new Date(o+a,y+i-1,s).getTime())/864e5),i}function dateDiffYear(e,t){e=e.split("-");var a,i,r=new Date(t),n=r.getFullYear(),d=r.getMonth()+1,l=r.getDate(),o=parseInt(e[0]),y=parseInt(e[1]),s=parseInt(e[2]);return i=d-y,l<s&&(i-=1),a=n-o,100*d+l<100*y+s&&(a-=1,i+=12),Math.floor((r.getTime()-new Date(o+a,y+i-1,s).getTime())/864e5),a}function policyCalcFunc(){dt1=document.getElementById("MyDate").value,dt2=document.getElementById("MyDateEnd").value,document.getElementById("miesiac").innerHTML=12*dateDiffYear(dt1,dt2)+dateDiffMonth(dt1,dt2)+1,document.getElementById("rok").innerHTML=dateDiffYear(dt1,dt2)+1}$.fn.datepicker.dates.en={days:["Niedziela","Poniedziałek","Wtorek","Środa","Czwartek","Piątek","Sobota"],daysShort:["Nd","Pon","Wt","Śr","Czw","Pt","Sb"],daysMin:["Nd","Pn","Wt","Śr","Cz","Pt","Sb"],months:["Styczeń","Luty","Marzec","Kwiecień","Maj","Czerwiec","Lipiec","Sierpień","Wrzesień","Październik","Listopad","Grudzień"],monthsShort:["Sty.","Lut.","Marz.","Kwie.","Maj","Czerw.","Lip.","Sier.","Wrze.","Paź.","Lis.","Gru."],today:"Dziś",clear:"Wyczyść",format:"yyyy-mm-dd",titleFormat:"MM yyyy",weekStart:1},$("#MyDate").datepicker({todayBtn:"linked",clearBtn:!0,todayHighlight:!0,templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}}),$("#MyDateEnd").datepicker({todayBtn:"linked",clearBtn:!0,todayHighlight:!0,templates:{leftArrow:'<i class="la la-angle-left"></i>',rightArrow:'<i class="la la-angle-right"></i>'}});</script>

@if (Session::has('notify_success'))
    <script>
        toastr.success('{{ Session::get('notify_success') }}');
    </script>
@endif
@if (Session::has('notify_danger'))
    <script>
        toastr.error('{{ Session::get('notify_danger') }}');s
    </script>
@endif