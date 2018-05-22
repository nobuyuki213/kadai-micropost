<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv-"X-UA-comoatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initinal-scale-1">
        <title>@yield('title')-Microposts</title>
        
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript-->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!--<style>-->
        <!--    body {-->
        <!--        background: url(http://www.tokkoro.com/picsup/2939281-text-writing-minimalism-typography-digital-art___abstract-wallpapers.jpg);-->
        <!--        background-position: top center;-->
        <!--        background-size: cover;-->
        <!--        height: 900px;-->
        <!--    }-->
        <!--</style>-->
        
    </head>
    <body>
        @include('commons.navbar')
        
        <div class="container">
            @include('commons.error_messages')
            
            @yield('content')
        </div>
    </body>
</html>