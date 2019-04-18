<?php 
	header("Content-Type: text/html; charset=utf-8");
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		include "db.php";

		
  	$query = "SELECT * FROM content WHERE cat_id=$id order by id desc";
  	$query2 = "SELECT * FROM kategoriya WHERE id=$id";

		$result = mysqli_query($db, $query);
    
		$result2 = mysqli_query($db, $query2);
		$row2 = mysqli_fetch_assoc($result2);

		$massiv = array();	
		while($row = mysqli_fetch_assoc($result)) {
		$massiv[] = $row;
		}
		/*if($result) {
			echo "yest";
		} else {
			echo "yy";
		}*/
 
	} else {
		die();
	}
 ?>
 <!DOCTYPE html>
 <html lang="uzb">
 <head>
 	<meta charset="utf-8">
 	<title>MNews</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
 	<link href="css/style.css" rel="stylesheet">
  <style type="text/css">
    .keys {
      color: #555;
      text-align: right;
      font-size: 10px;
    }
  </style>
 </head>
 <body>
 	<!-- Header start -->
 	<?php 
 		include_once('blocks/header.php');
 	 ?>
 	<!-- !Header finish -->
 	<div class="container">
 	<!-- ====Malumotlar==== -->
 		<h1 class="theme"><?php echo $row2['name']?> yangiliklari</h1> 
             
      
      	<?php foreach ($massiv as $value) { ?>
      		<div class="news">
      	    	<img src="rasm/<?=$value['img']?>">
            	<div>
          	 		<h2><?=$value['name']?></h2>
          	 		<p>
          	 		<?=$value['anons']?>
          	 		</p>
                <p class="keys"><span style="margin-right: 5px"><?=$value['datee'];?></span>
                <i class="far fa-eye" style="margin-right:5px;color:#aaa"></i><?=$value['keyss'];?></p>
          	 		<a href="contentmore.php?id=<?=$value['id']?>">Batafsil</a>
            	</div>
      		</div>
      <?php } ?>
     
  </div>
 	<!-- ====Malumotlar finish==== -->



 	</div>

 	<!-- Footer -->
 	<?php 
    	include_once('blocks/footer.php');
   	 ?>
   	<!-- !Footer finished -->
   	 <script type="text/javascript" src="js/jquery.js"></script>
   	 <script type="text/javascript" src="js/main.js"></script>
 </body>
 </html>