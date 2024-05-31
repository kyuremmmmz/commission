<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Game Information Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light d-flex flex-column justify-content-center align-items-center vh-100" onpageshow="if (event.persisted) noBack();" onUnload="">
    <div class="container text-center">
        <h1 class="mb-4">Welcome to Game Information Management System</h1>
        <h2 class="mb-4">Are you?</h2>
        <div class="gap-3 mx-auto d-grid col-6">

                <a href="{{route('admin.seeLogin')}}" class="btn btn-primary btn-lg">Committee</a>


                <a href="{{route('login')}}" class="btn btn-success btn-lg">Admin</a>


                <a href="{{route('seeGuest')}}" class="btn btn-secondary btn-lg">Guest</a>
        </div>
    </div>
    <script type="text/javascript">
        window.history.forward();
        function noBack() {
            window.history.forward();
        }
    </script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
