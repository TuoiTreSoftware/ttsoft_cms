@if(session()->has('flash.alerts'))
    @foreach(session()->get('flash.alerts') as $alert)
        <div class='alert alert-{{ $alert['level'] }}'>
            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">&times;</button>
            @if( ! empty($alert['title']))
                <div><strong>{{ $alert['title'] }}</strong></div>
            @endif
            {{ $alert['message'] }}
        </div>
    @endforeach
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif