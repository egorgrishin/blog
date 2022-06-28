<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
</head>
<body class="antialiased">
<div id="app">
        <router-link to="/">111</router-link>
        <router-link to="/2">222</router-link>
        <br>
        <router-view></router-view>
</div>

<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
