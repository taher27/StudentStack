<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <style>
            
            a:link 
            {
                color: whitesmoke;
            }
            a:visited 
            {
                color: whitesmoke;
            }
            a:hover {
    color: cyan;
}
            .table-responsive{
            height:200px; width:300px;
            overflow-y: auto;
            border: 1px solid;
            float: right;
            margin-right: 10px;
            margin-top: 20px;
            background-color: #455a64;
            }.table-responsive:hover{}

            table{width:100%;}
            /*tr:nth-child(even) {
                background-color: #607d8b;
            }*/
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <script>
                //alert("hello");
                window.onload = function ()
                {
            var $el = $(".table-responsive");
            function anim() 
            {
                var st = $el.scrollTop();
                var sb = $el.prop("scrollHeight")-$el.innerHeight();
                $el.animate({scrollTop: st<sb/2 ? sb : 0}, 7000, anim);
               
            }  
            function stop()
            {
                $el.stop();
            }
            anim();
            $el.hover(stop,anim);
            };
        </script>
    </head>
    <body>
    <center>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
            
            <tbody>
                <?php
                    include("database.php");
                    mysqli_set_charset($con,"utf8");
                    $sql = mysqli_query($con,"select * from feed ORDER BY feed.feed_id DESC");
                    
                    while($row = mysqli_fetch_row($sql))
                    {
                       echo "<tr><td><a target='self' href='$row[2]'>$row[1]</a></td></tr>"; 
                    }
                ?>
                 
            </tbody>
            </table>
        </div>
       </center>   
    </body>
</html>


