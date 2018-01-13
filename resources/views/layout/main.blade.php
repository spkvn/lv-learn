<!DOCTYPE html>
<html>
    <head>
        <title>lara.vue learning project</title>
        <style>body{padding-top:40px;height:100vh;background:#efefef}</style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.2/css/bulma.css">
    </head>
    <body>
        <section class="section">
            @yield('content')
        </section>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.17.1/axios.min.js"></script>
        <script src="js/vue.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>