@if ($errors->any())
    <div class="alert alert-danger alert-dismissible callout callout-danger error-panel">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        Whoops! There were some problems with your input
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::get('message')!='')
    <div class='alert alert-{{ Session::get("message_type") }}'>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!!Session::get('message')!!}
    </div>
@endif