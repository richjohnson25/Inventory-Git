<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>

    <style>
        .header {
            background-color: #006666;
            height: 60px;
            width: 100%;
            position: fixed;
            margin: 0px;
        }

        h2 {
            margin: 0;
            padding: 10px 5px 10px 50px;
            color: white;
        }

        h1 {
            padding: 10px 5px 10px 40px;
        }

        h4 {
            color: white;
            text-align: center;
        }

        img {
            object-fit: cover;
            opacity: 0.5;
            float: right;
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
            height: 30%;
            top: 60px;
            display: table;
            background-color: #CCECFF;
            overflow: hidden;
        }

        .homeTitle {
            height: 100%;
            background-color: #CCECFF;
            padding-top: 200px;
            text-align: center;
        }

        .homeTitle, .rightImage {
            float: left;
            width: 50%;
        }

        .featurePanel {
            background-color: #D8D8D8;
            width: 100%;
            height: 100%;
            text-align: center;
        }

        .feature-layout {
            display: grid;
            margin-left: auto;
            margin-right: auto;
            grid-template-columns: 1fr 1fr 1fr;
            width: 25%;
        }

        .feature-container {
            display: grid;
            margin-left: auto;
            margin-right: auto;
            border-style: solid;
            width: 200px;
        }

        .feature-container h6 {
            font-weight: bold;
        }

        .feature-container img {
            margin-left: auto;
            margin-right: auto;
        }

        .sidebarBtn {
            font-size: 25px;
            color: white;
            background-color: #006666;
            border: none;
            padding: 10px 10px;
            margin: 0;
            display: inline-block;
            vertical-align: top;
        }

        .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            left: 0;
            background-color: #CCECFF;
            overflow-x: hidden;
            padding-top: 20px;
            padding-left: 10px;
            display: none;
        }

        .registerPanel, .outletRegisterPanel, .loginPanel {
            width: 50%;
            margin: auto;
            padding: 10px 10px;
            background-color: white;
        }

        .loginBtn, .searchBtn {
            text-decoration: none;
            background-color: #CCECFF;
            border: none;
            padding: 10px 24px;
        }

        .form-group {
            padding: 10px 20px 10px 20px;
        }

        .sidenav a, .dropdown-btn, .sidenav-btn {
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

        .sidenav-btn {
            font-size: 30px;
        }

        .sidenav a:hover, .dropdown-btn:hover {
            background-color: #CCDCFE;
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

        .form-control, .form-select {
            width: 400px;
        }

        .profileBtn {
            background-color: #006666;
            color: white;
            border: none;
            cursor: pointer;
        }

        .profile-dropdown {
            float: right;
            position: relative;
            display: inline-block;
        }

        .profile-menu-content {
            display: none;
            position: absolute;
            background-color: #006666;
            width: 200px;
            right: 0;
            overflow: auto;
        }

        .profile-menu-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .show {display: block;}

        input, label, select {
            margin-left: 10px 10px 10px 10px;
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

        .main-bg, .register-bg {
            padding-top: 60px;
            width: 100%;
            height: 100%;
        }

        .register-bg {
            background-color: #6699CC;
        }

        .main {
            background-color: #D8D8D8;
            margin-left: auto;
            margin-right: auto;
            width: 70%;
        }

        .dashboard-main {
            background-color: #D8D8D8;
            margin-left: auto;
            margin-right: auto;
            width: 80%;
        }

        .summary-row {
            background-color: #D8D8D8;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            width: 100%;
            height: 100%;
        }

        .summary-box {
            display: inline-block;
            background-color: white;
            margin-left: auto;
            margin-right: auto;
            width: 180px;
            height: 100px;
            padding: 10px 5px;
        }

        .summary-table {
            background-color: #D8D8D8;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            width: 90%;
            height: 100%;
        }

        table, tr, th {
            border: 2px solid;
            vertical-align: middle;
            text-align: center;
        }

        thead {
            border: 2px solid;
            background-color: #CCECFF;
            text-align: center;
        }

        .addButton {
            padding-left: 40px;
            padding-bottom: 20px;
        }

        .addButton a {
            text-decoration: none;
            font-size: 20px;
            color: black;
            display: block;
            background-color: #CCECFF;
            width: 200px;
            text-align: center;
            cursor: pointer;
            outline: none;
        }

        span {
            font-weight: bold;
        }

        .search-form {
            padding-left: 40px;
        }

        .row {
            padding: 10px 50px;
        }

        .col-md-4 input, .col-md-4 select {
            width: 300px;
        }

        .col-md-2 input {
            width: 200px;
        }

        #stock_in_notes input, #stock_out_notes input {
            width: 1000px;
        }

        .search-holder {
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .form-holder {
            padding: 20px;
        }

        .reportTitle {
            padding-left: 50px;
        }

        .print-section {
            padding: 20px 50px;
        }

        .editPanel a, .print-section a {
            padding: 10px 10px;
            text-decoration: none;
            font-size: 20px;
            color: white;
            border: none;
            background-color: #006666;
            text-align: left;
            cursor: pointer;
            outline: none;
        }
    </style>
</head>
<body>
    @include('layout.header')

    @if($auth)
        @include('layout.sidebar')
    @endif

    @include('layout.message')

        @yield('body')

        <script>
            var dropdown = document.getElementsByClassName("dropdown-btn");
            var i;
            var sidenav = document.getElementById("sidenav");
            var stockInDate = new Date();
            var _token = $('input[name="_token"]').val();

            function openSidenav() {
                sidenav.style.display = "inline-block";
            }

            function closeSidenav() {
                sidenav.style.display = "none";
            }

            $('#registerBtn').click(function(){
                $('#register-form').submit();
            })

            $('#outletRegisterBtn').click(function(){
                $('#outlet-register-form').submit();
            })
                
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

            function profileMenu() {
                document.getElementById("profileMenu").classList.toggle("show");
            }

            window.onclick = function(event) {
                if (!event.target.matches('.profileBtn')) {
                    var dropdowns = document.getElementsByClassName("profile-menu-content");
                    var j;
                    for (j = 0; j < dropdowns.length; j++) {
                        var openDropdown = dropdowns[j];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        </script>
        <script>
            $('#product_id').change(function() {
                var product_id = $(this).val();
                var url = '{{ route("getProductDetails", ":id") }}';
                url = url.replace(':id', product_id);

                $.ajax({
                    url: url,
                    type: 'get',
                    dataType: 'json',
                    success: function(response) {
                        if (response != null) {
                            $('#stock_per_unit').val(response.current_quantity);
                            document.getElementById("stock_out_quantity").max = response.current_quantity;
                        }
                    }
                });
            });
        </script>

    @include('layout.footer')
</body>
</html>