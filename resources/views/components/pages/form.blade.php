<div id="kt_content_container" class="container">
    <div class="d-flex flex-column flex-md-row">
        <div class="flex-md-row-fluid">
            @if(count($errors) > 0)
            <div class="alert alert-dismissible bg-light-danger border border-danger border-dashed d-flex flex-column flex-sm-row w-100 p-5 mb-10" role="alert">
                <div class="d-flex flex-column pe-0 pe-sm-10">
                    @foreach($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
            </div>
            @endif
            
            {{ $slot }}

        </div>
    </div>
</div>