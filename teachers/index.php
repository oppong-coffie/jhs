<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        $(document).ready(function(){
            //loding the index page
            $("#content").load("teacher_dashboard.php")

            $(".nav-link").click(function(event){
                //preventing the behavior when a link is click
                //preventing the behavior when a link is click
                event.preventDefault();

                //

            });
        });
    </script>
</head>
<body>
    
    <div id="content"></div>
</body>
</html>