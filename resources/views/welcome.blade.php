<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    </script>
      
    <script>
        function getBooks() {
            $.ajax({
                type:'GET',
                url:'/api/books',
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    $("#display").html(JSON.stringify(data));
                }
            });
        }

        function getAuthors() {
            $.ajax({
                type:'GET',
                url:'/api/authors',
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    $("#display").html(JSON.stringify(data));
                }
            });
        }

        function getImage() {
            var id = $('#bookID').val();

            $.ajax({
                type:'GET',
                url:'/api/books/' + id + '/image',
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    $("#display").html(data);
                }
            });
        }

        function getISBN() {
            var isbn = $('#isbn').val();

            $.ajax({
                type:'GET',
                url:'/api/books/' + isbn,
                data:'_token = <?php echo csrf_token() ?>',
                success:function(data) {
                    $("#display").html(JSON.stringify(data));
                }
            });
        }

    </script>

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                <div class="title m-b-md">
                    Library
                </div>

                <div class="links">
                    <input type='button' value='Display All Books' onclick='getBooks()'/><br>

                    <input type='button' value='Display All Authors' onclick='getAuthors()'/><br>

                    <input type='text' id='bookID' placeholder='Book ID'/>
                    <input type='button' value='Display Image' onclick='getImage()'/><br>

                    <input type='text' id='isbn' placeholder='ISBN Number'/>
                    <input type='button' value='Display Information' onclick='getISBN()'/><br>
                    
                </div>

                

            </div>
        </div>
        <div id="display">

        </div>
        <br><br>
    </body>
</html>
