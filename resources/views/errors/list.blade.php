@if($errors->any())
    <div class="alert alert-danger fade in">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4>There is a problem.</h4>
        <p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </p>
    </div>
@endif