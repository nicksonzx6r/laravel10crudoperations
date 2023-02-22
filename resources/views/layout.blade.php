<!DOCTYPE html>
<html>
<head>
    {{--title is going to remplaces to each page that will extend--}}
    <title>Laravel 10 | @yield('title')</title>
    {{--!!!title is going to remplaces to each page that will extend--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
          crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<div class="container">
    {{--We check if we have messages from the controller and display them to the user--}}
    @if($message = \Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @endif

    @if($message = \Session::get('warning'))
        <div class="alert alert-warning">
            {{ $message }}
        </div>
    @endif
    {{--!!!We check if we have messages from the controller and display them to the user--}}

    {{--This section is going to be extended by our blade files--}}
    @yield('content')
    {{--!!!This section is going to be extended by our blade files--}}
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript">

    {{--When we will perform delete request, we are going to prompt to user for that--}}
    $('.showConfirm').click(function(event) {
        const TITLE = "Are you sure you want to delete this record?";
        const QUESTION = "If you delete this, it will be gone forever.";
        let form =  $(this).closest("form");
        event.preventDefault();
        swal({
            title: TITLE,
            text: QUESTION,
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
    {{--!!!When we will perform delete request, we are going to prompt to user for that--}}
</script>
</body>

</html>
