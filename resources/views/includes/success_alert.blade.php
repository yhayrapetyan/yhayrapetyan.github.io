<script>
    const successMessage = localStorage.getItem('successMessage');
    localStorage.removeItem('successMessage');
    if (successMessage){
        const div = document.createElement('div');
        div.id = 'alert-success';
        div.classList.add('alert');
        div.classList.add('alert-success');
        div.innerHTML = successMessage;
        document.body.appendChild(div);
    }
</script>

@if (session()->has('success') )
    <div class="alert alert-success" id="alert-success">
        @if(is_array(session('success')))
            <ul>
                @foreach (session('success') as $message)
                    <li id="message">{{ $message }}</li>
                @endforeach
            </ul>

        @endif
    </div>
@endif

<script type="text/javascript">
    setTimeout(function () {
        $('#alert-success').fadeOut('slow');
    }, 5000);
</script>
