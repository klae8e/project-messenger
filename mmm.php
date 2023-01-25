<div class="col-sm-3 my-auto">
    <input type="text" class="form-control rounded-pill" name="live_search" id="live_search" autocomplete="off" placeholder="Search ...">
</div>
</br>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#live_search").keyup(function () {
                var query = $(this).val();
                if (query != "") {
                    $.ajax({
                        url: 'mmm.php',
                        method: 'POST',
                        data: {
                            query: query
                        },
                        success: function (data) {
                            $('#search_result').html(data);
                            $('#search_result').css('display', 'block');
                            $("#live_search").focusout(function () {
                                $('#search_result').css('display', 'block');
                            });
                            $("#live_search").focusin(function () {
                                $('#search_result').css('display', 'block');
                            });
                        }
                    });
                } else {
                    $('#search_result').css('display', 'block');
                }
            });
        });
    </script>

<?php
    
    
    // сервер бд
    $dbservername = "localhost";
    // имя пользователя бд
    $dbusername = "root";
    // пароль пользователя бд
    $dbpassword = "";
    // название бд
    $dbname = "messenger";

    // Подключение к базе данных
    $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

   
    #$_POST['query'] = 'user';


   if (isset($_POST['query'])) {
      $query = "SELECT id,login FROM users WHERE login LIKE '{$_POST['query']}%' LIMIT 20";
      $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($res = mysqli_fetch_array($result)) {
            ?>
            <div class="text-center p-3" style="border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;">
                
            
            <?
            echo "<a href="."bookpage.php?id=".$res['id']."><div class="."list"."</br>". $res['login']. "<br/></div></a>";
            echo '<style>.list{border-bottom:1px solid black}a{outline:none; color:black; text-decoration: none;}</style>';
            ?>
            </div>
            <?
      }
    }
}
?>