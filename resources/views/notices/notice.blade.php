@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&#215;</button>
        <p><i class="icon fa fa-check"></i> {{session()->get('success')}}</p>
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible text-center">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&#215;</button>
        <p><i class="icon glyphicon glyphicon-remove"></i> {{session()->get('error')}}</p>
    </div>
@endif

@if (count($errors)>0)
    <div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&#215;</button>
        <ul>
            @foreach ($errors->all() as $error)
                <li><b>Ошибка.</b> {{$error}}</li>
            @endforeach
        </ul>
    </div>

@endif
