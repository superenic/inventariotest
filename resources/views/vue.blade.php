<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <title>usando vue</title>
</head>
<script>
    var rutas = <?php
        $rutas = [
            'index' => route('producto.index'),
            'create' => route('vue.create')
        ];
        echo json_encode($rutas);
    ?>
</script>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="{{route('vue.index')}}">lista</a>
                    <a class="nav-link" href="{{route('vue.create')}}">nuevo</a>
                </div>
            </div>
        </div>
    </nav>
    <div id="app">
        <div class="container">
            @yield('contenido')
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>