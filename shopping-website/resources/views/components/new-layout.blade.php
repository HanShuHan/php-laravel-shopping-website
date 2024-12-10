<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    {{--Meta for Ajax--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Home</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="css/style_global.css" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        :root {
            --white: #efefef;
            --white400: #cccccc;
            --green500: #7fad39;
            --green400: #5f812a;
            --grey: #6b6b6b;
        }


        body {
            padding: 0;
            margin: 0;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #efefef;
        }

        .search-results {
            padding: 5em;
        }
        .green {
            background-color: var(--green500);
            border: none;
            outline: none;
            color: var(--white)
        }
        .hover-dark {
            transition: color 0.3s ease-in;
            color: var(--white);
        }
        .hover-dark:hover {
            transition: color 0.3s ease-in;
            color: var(--grey);
        }
        .green-text {
            color: var(--green500);
        }
        /*#region HEADER*/

        header {
            position: sticky !important;
            top: 0;
            left: 0;
            bottom: 0;
            width: 100%;
            z-index: 999 !important;
            margin-bottom: 2em;
            box-shadow: 8px 8px 8px rgba(0, 0, 0, 0.1);
        }

        .menu-item .menu-link {
            color: var(--white);
            text-decoration: none;
            transition: color 0.3s ease-in;
        }

        .menu-item .menu-link:hover {
            color: var(--white400);
            transition: color 0.3s ease-in;
        }
        .menu-container {
            padding-top: 1em;
            background-color: var(--green500);
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            height: auto;
        }

        .menu-left {
            display: flex;
            flex-direction: row;
        }

        .menu-left ul {
            display: flex;
            flex-direction: row;
            list-style-type: none;
            align-items: center;
            text-align: center;

        }

        .menu-left .menu-item {
            color: var(--white);
            font-size: 18px;
            text-align: center;
            padding-top: 0.3em;
            display: flex;
            flex-direction: row;
            align-items: center;
            margin-right: 1em;
            cursor: pointer;
            transition: color 0.3s ease-in;
        }

        .menu-item:hover {
            color: var(--white400);
            transition: color 0.3s ease-in;
        }
        .logo a{
            font-size: 28px;
            margin-right: 2rem;
            color: var(--white);
            text-decoration: none;
            transition: color 0.3s ease-in;
        }

        .logo:hover {
            color: var(--white400);
            transition: color 0.3s ease-in;
        }

        .logo a:visited {
            color: var(--white);
            text-decoration: none;
        }
        .menu-right {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin-top: -1em;
        }

        .searchbar {
            flex-direction: row;
            display: flex;
            text-align: center;
            align-items: center;
            margin-right: 1.5em;

        }

        .searchbar input {
            background-color: var(--white);
            border: none;
            padding: 0.5em;
            margin-right: -2.5em;
            border-radius: 5px;
            transition: width 0.3s ease-in;
            width: 12em;
        }

        .searchbar input:focus {
            transition: width 0.3s ease-in;
            width: 18em;
        }
        .searchbar button {
            border: none;
            outline: none;
            position: relative;
            color: var(--green500);
            padding-top: 0.4em;
        }

        .user-menu-controls {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
        }

        .user-menu-controls a {
            text-decoration: none;
            background-color: var(--white);
            color: #605f5f;
            padding: 0.5em;
            text-align: center;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin-right: 0.5em;
            border-radius: 5px;
            height: 2.5em;
            width: 6em;
            transition: background-color 0.3s ease-in;
        }

        .user-menu-controls a:hover {
            background-color: var(--white400);
            transition: background-color 0.3s ease-in;
        }

        .cart-info-badge {
            background-color: var(--green500);
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--white);
            padding: 0.2em;
            height: 1.2em;
            width: auto;
            margin-left: 0.4em;
        }

        .menu-context {
            position: absolute;
            top: 4.5em;
            left: 10em;
            height: 14.7em;
            background-color: var(--green500);
            width: 10em;
            display: none;
        }

        .menu-context ul {
            list-style-type: none;
            padding-left: 0;
        }

        .menu-context ul li {
            padding: 1em 0.5em;
            transition: background-color 0.3s ease-in;
            cursor: pointer;
        }

        .menu-context ul li:hover {
            padding: 1em 0.5em;
            background-color: var(--green400);
            transition: background-color 0.3s ease-in;
        }
        .menu-context ul li a {
            text-decoration: none;
            color: var(--white);

            font-size: 18px;
        }

        /*#endregion*/
        /*#region CAROUSEL*/

        #carousel {
            padding-top: 5em;
        }
        .carousel-control-prev, .carousel-control-next {
            color: var(--green500) !important;
        }

        .carousel-control-prev-icon, .carousel-control-next-icon {
            filter: invert(1);
        }
        .carousel-indicators button {
            background-color: var(--white) !important; /* Bootstrap 5's .bg-dark color */

            width: 12px;
            height: 8px;

        }

        .carousel-indicators .active {
            background-color: white; /* Bootstrap 5's .bg-warning color */
            /* Bootstrap 5's .bg-warning color */
        }

        .carousel-inner .carousel-item img {
            height: 400px;
            width: auto;
        }

        .carousel-caption {
            color: #343a40; /* Bootstrap 5's .text-dark color */
            background-color: var(--green500) !important;
        }
        /*#endregion*/

        /*#region PRODUCTS PAGE */
        .active-category {
            background-color: var(--green500) !important;
            color: var(--white) !important;
        }

        .menu-header {
            color: var(--green500);
        }
        .active-page {
            background-color: var(--green500) !important;
            color: var(--white) !important;
        }

        .inactive-page {
            color: var(--green500) !important;
        }

        .page-link {
            border: none !important;
            color: var(--green500) !important;
        }

        .page-item.active .page-link {
            background-color: var(--green500) !important;
            color: #ffffff !important;
        }

        .pagination-container {
            text-align: center;
        }

        .pagination-info {
            margin-top: 3px;
            display: inline-block;
        }
        /*#endregion*/

        /*#region ProductCard*/
        .card-btn {
            background-color: var(--green500);
            border: none;
        }

        .card-btn:hover {
            background-color: var(--green400);
            transition: background-color 0.3s ease-in;
        }

        .card-star {
            color: var(--green500);
        }
        /*endregion*/

        /*region Cart*/
        .dropdown-item:hover, .dropdown-item:focus {
            background-color: #7fad39 !important;
            color: white !important;
        }
        /* Login page */

        .login, .register {
            width: 100%;
            height: 100%;
            background-color: var(--green500);
        }


        .login button[type="submit"],
        .register button[type="submit"] {
            border: 1px solid #7FAD39;
        }
        .login button[type="submit"]:hover,
        .register button[type="submit"]:hover {
            background-color: #7FAD39!important;
            border: 1px solid #7FAD39;
            cursor: pointer;
            transition: all .3s ease-in-out;
        }
        .login p a,
        .register p a {
            color: #7FAD39!important;
        }
        .login a:active,
        .register a:active {
            color: red!important
        }
        .login .form-parent,
        .register .form-parent {
            box-shadow: 1px 0px 6px 2px rgba(0,0,0,0.1);
        }
        .login span.note,
        .register span.note {
            font-weight: bold;
        }
        /*#endregion*/
    </style>
</head>
<body>
    {{ $slot }}
    <script>
        let menuContext = null;
        let contextActivator = null;
        let menuOpen = false;
        menuContext = document.getElementById('menuContext');
        contextActivator = document.getElementById('contextActivator')
        contextActivator.addEventListener('click', () => {
            menuOpen = !menuOpen;
            menuContext.style.display = menuOpen ? "none" : "block";

        });
    </script>
    <script src="js/test.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>
