@if ( count( $errors ) > 0 )
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            <button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">&times;</span>
            </button>
            <p>{!! $error !!}</p>

        </div>
    @endforeach
@elseif(Session()->has('success'))
    <div class="alert alert-success">
        <button class="close" type="button" data-dismiss="alert"><span aria-hidden="true">&times;</span>
        </button>
        <p>{{trans(Session()->get('success'))}}</p>
    </div>
@endif

