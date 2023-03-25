@if ($errors->any())
    <div class="alert alert-danger" id="alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<script type="text/javascript">
    setTimeout(function () {
        $('#alert-danger').fadeOut('slow');
    }, 5000);
</script>

