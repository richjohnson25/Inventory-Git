<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <style>
        .header {
            background-color: #006666;
            height: 60px;
            margin: 0px;
            top: 18px;
        }

        h2 {
            padding: 10px 5px 10px 40px;
            color: white;
        }

        h4 {
            color: white;
            text-align: center;
        }

        img {
            object-fit: cover;
            opacity: 0.4;
        }

        .rightHeader {
            position: absolute;
            right: 10px;
            top: 18px;
            width: 300px;
        }

        .rightHeader a {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            border: none;
            background-color: #006666;
            width: 60%;
            text-align: left;
            cursor: pointer;
            outline: none;
        }

        .button {
            height: 40px;
            margin: 0px;
        }

        .featureButton {
            background-color: #0070C0;
        }

        .footer {
            background-color: #006666;
            height: 60px;
            margin: 0px;
            top: 18px;
            width: 100%;
        }

        .homeBanner {
            width: 100%;
            height: 600px;
            background-color: #CCECFF;
            overflow: hidden;
        }

        .rightImage {
            width: 50%;
            margin-left: auto;
        }

        .featurePanel {
            background-color: #D8D8D8;
            width: 100%;
            height: 300px;
            text-align: center;
        }

        .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 60px;
            left: 0;
            background-color: #CCECFF;
            overflow-x: hidden;
            padding-top: 20px;
        }

        .registerPanel, .outletRegisterPanel, .loginPanel {
            text-align: center;
        }

        .sidenav a, .dropdown-btn {
            padding: 6px 8px 6px 16px;
            text-decoration: none;
            font-size: 20px;
            color: black;
            display: block;
            border: none;
            background-color: #CCECFF;
            width: 100%;
            text-align: left;
            cursor: pointer;
            outline: none;
        }

        .registerPanel a {
            text-decoration: none;
            font-size: 20px;
            color: black;
            display: block;
            border: none;
            background-color: #CCECFF;
            width: 100%;
            text-align: center;
            cursor: pointer;
            outline: none;
        }

        input {
            margin: 10px;
        }

        .dropdown-container {
            display: none;
            background-color: #CCECFF;
            padding-left: 8px;
        }

        .fa-caret-down {
            float: right;
            padding-right: 8px;
            color: black;
        }

        #active {
            color: white;
            background-color: #336699;
        }

        #sub_menu {
            color: white;
            background-color: #6699CC;
        }

        .main-bg {
            width: 100%;
            height: 100%;
        }

        .main {
            background-color: #D8D8D8;
            margin-left: auto;
            margin-right: auto;
            width: 70%;
        }

        table, tr, th {
            border: 1px solid;
        }

        thead {
            border: 1px solid;
            background-color: #CCECFF;
            text-align: center;
        }
    </style>
</head>
<body>
    @include('layout.header')

        @yield('body')

        <script>
            var dropdown = document.getElementsByClassName("dropdown-btn");
            var i;
            
            for (i = 0; i < dropdown.length; i++) {
                dropdown[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var dropdownContent = this.nextElementSibling;
                    if (dropdownContent.style.display === "block") {
                        dropdownContent.style.display = "none";
                    } else {
                        dropdownContent.style.display = "block";
                    }
                });
            }
        </script>

    @include('layout.footer')
</body>
</html>