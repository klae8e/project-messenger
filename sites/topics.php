<?php 
  session_start();

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="jquery-3.5.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../styles/mainstyle.css" rel="stylesheet" type="text/css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Topics</title>
    <link rel="shortcut icon" href="../images/favicon.ico">
</head>
<body style="background-color: #B3D1D4;">
  <?php
    include "../connect.php";

    #include "checker.php";

    /*
    if(count($_COOKIE) > 0) {
        echo "Cookies are enabled.";
      } else {
        echo "Cookies are disabled.";
      }
    */

    if (!$_SESSION['user']) {
      header("Location: ../404.html");exit();
    }
    else{

      ?>

      <div id="ex0" class="container-fluid">
              <div id="ex1" class="container-fluid">

                <div id="ex2" class="container-sm">
                  <div id="ex3" class="row">

                    <span id="nav1" class="col-sm-2  text-center my-auto">
                      <a class="navigations" value="Profile" href="../profile.php?id=<?php echo $_SESSION['user']['id']?>"><img src="../images/user.png" class="logos"> Profile</a>
                    </span>
                    <span id="nav2" class="col-sm-2 text-center my-auto">
                      <a class="navigations" value="Profile" href="../mainpage.php?id=<?php echo $_SESSION['user']['id']?>"><img src="../images/message.png" class="logos1"> Chats</a>
                    </span>

                    <span id="nav3" class="col-sm-2 text-center my-auto">
                      <a class="navigations" value="Profile" href="../friends.php?id=<?php echo $_SESSION['user']['id']?>"><img src="../images/friends.png" class="logos1"> People</a>
                    </span>  

                    <span id="nav4" class="col-sm-2 text-center my-auto">
                      <a class="navigations" value="Profile" href="../forum.php?id=<?php echo $_SESSION['user']['id']?>"><img src="../images/logout.png" class="logos1"> Forum</a>
                    </span>

                    <span id="nav4" class="col-sm-2 text-center my-auto">
                      <?
                        if ($_SESSION['user']['role'] != 0) {
                      ?>
                      <a class="navigations" value="Profile" href="../adminpanel.php?id=<?php echo $_SESSION['user']['id']?>"><img src="../images/logout.png" class="logos1"> Admin</a>
                      <?
                        }
                      ?>
                    </span>

                    <span id="nav4" class="col-sm-2 text-center my-auto">
                      <a class="navigations" value="Profile" href="../logout.php?id=<?php echo $_SESSION['user']['id']?>"><img src="../images/logout.png" class="logos1"> Log out</a>
                    </span>

                  </div>
                </div>
              </div>

          	<div id="ex4" class="container-fluid">
                <div class="container bgcl2">

                	<div>
            			<? 

            			$query_topic = "select users.id, users.login, all_topic.topic_id, all_topic.author, all_topic.name_topic, all_topic.textarea, all_topic.date from users inner join all_topic on users.id = all_topic.author";
                      	$queryt = mysqli_query($sql, $query_topic) or die("1. error_sql!");

                      	while ($row = $queryt->fetch_assoc()){ 
                        	if ($row['topic_id'] == $_GET['id']) {
                        		echo "<div id='topic_bg' class='container col-sm-11'>";
                        		echo "<div class='text-center mb-4'><h2>Topic: ".$row['name_topic']."<h2></div>";
                        		echo "<div class='row bordered m-3'>";
                        		echo "<div class='col-sm-2'>".$row['login']."</div>";
                        		echo "<div class='col-sm-10' id='description'>".$row['textarea']."</div>";
                        		echo "</div>";

                        		}

                        }

                        function load_topic_text(){
                        	include "../connect.php";
                        	$query_list = "select users.id, users.login, users.user_img, ".$_GET['author']."_".$_GET['id'].".user_id, ".$_GET['author']."_".$_GET['id'].".text, ".$_GET['author']."_".$_GET['id'].".date from users inner join ".$_GET['author']."_".$_GET['id']." on users.id = ".$_GET['author']."_".$_GET['id'].".user_id";
	              			$query_l = mysqli_query($sql, $query_list) or die("1. error_sql!");
	              			
	              			while ($row2 = $query_l->fetch_assoc()){
	              				
	                    		
	                    		echo "<div class='row bordered m-3'>";
	                    		echo "<div class='col-sm-2'><div class='text-center border'>".$row2['login']."</div><div class='border'><img class='text-center img-fluid' src=../".$row2['user_img']."></div></div>";
	                    		echo "<div class='col-sm-8'>".$row2['text']."</div>";
	                    		echo "<div class='col-sm-2'>".$row2['date']."</div>";
	                    		echo "</div>";
	              			}
                        }
                        load_topic_text();
                		
                		?>

                		<form method="post" id="topic_in" class="row text-center">
	                		<textarea class="p-2 col-sm-10 mar30" name="topic_text" required></textarea>
	                		<input class="col-sm-2" type="submit" name="submit_topic">
	                	</form>

                		<?
                		echo "</div>";
                        	
                      	

            if (isset($_POST['topic_text'])) {
              $queryin = "insert ".$_GET['author']."_".$_GET['id']."(user_id, text) values(".$_SESSION['user']['id'].", '".$_POST['topic_text']."')";
              $queryin = mysqli_query($sql, $queryin) or die("1. error_sql!");
              header("Refresh:0");

            }
						

                	 	?>
                	 	
                	 </div>

                	


                </div>
            </div>

               <?php
          
        }
        
        ?>

        <style>
        	#topic_bg{
        		background-color: white;
        		border: 1px solid black;
        		border-radius: 20px;
        		padding: 20px;
        	}
        	#topic_in{
        		
        	}
        	#description{
        		
        	}
        	textarea{
        		
        		width: 100%;
        		margin: 0;
        		padding: 0;
        	}
        	.bordered{
        		border: 1px solid black;
        		padding: 10px;
        	}

        </style>
</body>
</html>