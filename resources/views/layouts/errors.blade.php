<div class="validationMessage">
    <div>
        @if(session()->has('success_message'))
            <div class="alert alert-success">
                {{session()->get('success_message')}}
            </div>
        @endif
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
{{--

@if (count($errors) > 0)
    <!-- Список ошибок формы -->
    <div class="alert alert-danger">
        <strong>Opss! Something error!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
--}}
