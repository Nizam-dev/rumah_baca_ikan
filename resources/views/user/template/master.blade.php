<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== BOXICONS ===============-->
        @include('user.template.css')
        <link rel="stylesheet" href="{{asset('public/template/assets/css/styles.css')}}">

        <title>Responsive bottom navigation</title>
    </head>
    <body>
        <!--=============== HEADER ===============-->
        <header class="header" id="header">
            @include('user.template.bottom_navbar')
        </header>

        <main>
            <!--=============== HOME ===============-->
            <section class="container_b section section__height" id="home">
                
                @yield('content')

            </section>

            <!--=============== ABOUT ===============-->
           
        </main>
        

        <!--=============== MAIN JS ===============-->
        @include('user.template.js')
    </body>
</html>