<script> var HOST_URL = @php echo '"' . url('/') . '"'; @endphp; </script>
<script> var PERMISSIONS = @auth {!! json_encode(cache()->tags(['users', 'permissions'])->remember('users_'.auth()->id().'_permissions_all', 900, function () { return auth()->user()->permissions()->get()->pluck('code')->toArray(); })) !!} @else []  @endauth; </script>
<script src="{{ asset('js_' . str_replace('.', '_', config('app.version')) . '/app.js') }}"></script>
@if (Session::has('notify_success'))
    <script>
        toastr.success('{{ Session::get('notify_success') }}');
    </script>
@endif
@if (Session::has('notify_danger'))
    <script>
        toastr.error('{{ Session::get('notify_danger') }}');
    </script>
@endif