<html lang="ru">

	<head>

		<meta charset="utf-8">
		<meta name="yandex-verification" content="8acc49cefdb2350a" />

		<title>Игровая библиотека</title>

		<link rel="stylesheet" href="css/main.css" type="text/css">
		<link rel="stylesheet" href="css/description.css" type="text/css">
		
		<script src="https://vk.com/js/api/openapi.js?162"></script>
		<script src="https://vk.com/js/api/share.js?95"></script>
		<script async src="https://cse.google.com/cse.js?cx=013547437862958365309:qzbstjt9zxc"></script>
		<!--<div class="gcse-search"></div>-->

		<link rel="shortcut icon" href="imgs/book.ico">

	

		<meta name="keywords" content="game, library, игры, бибиилотека, игровая">

		<meta name="viewport" content="width=device-width, initial-scale=1">

	</head>
	<body>
	

		<div class="wrapper">

			<div class="content">
			
			<div class="description">
			 <?php
				require_once 'connection.php'; 
				echo "<h2>Поиск</h2>";

				$link = mysqli_connect($host, $user, $password, $database) 
						or die("Ошибка1 " . mysqli_error($link)); 
						 
				$search = $_POST['gameName'];
				$search = trim($search);
				$search = strip_tags($search);        
						 
				$query ="SELECT * FROM Game WHERE Name = '$search'" ;
					 
				$result = mysqli_query($link, $query) or die("Ошибка2 " . mysqli_error($link));
				if($result)
				{
					$row = mysqli_fetch_row($result);
					
					$pub_query ="SELECT Name FROM Publisher WHERE Id = '$row[1]'" ;
					$os_query ="SELECT Name FROM OS WHERE Id = '$row[3]'" ;
					$tm_query ="SELECT Name FROM TM WHERE Id = '$row[2]'" ;
					$lng_query ="SELECT Lng FROM Lng WHERE Id = '$row[8]'" ;
					$ser_query ="SELECT Name FROM Series WHERE Id = '$row[4]'" ;
					
					$pub_result = mysqli_query($link, $pub_query) or die("Ошибка2 " . mysqli_error($link)); 
					$os_result = mysqli_query($link, $os_query) or die("Ошибка2 " . mysqli_error($link)); 
					$tm_result = mysqli_query($link, $tm_query) or die("Ошибка2 " . mysqli_error($link)); 
					$lng_result = mysqli_query($link, $lng_query) or die("Ошибка2 " . mysqli_error($link)); 
					$ser_result = mysqli_query($link, $ser_query) or die("Ошибка2 " . mysqli_error($link)); 
					
					$pub_row = mysqli_fetch_row($pub_result);
					$os_row = mysqli_fetch_row($os_result);
					$tm_row = mysqli_fetch_row($tm_result);
					$lng_row = mysqli_fetch_row($lng_result);
					$ser_row = mysqli_fetch_row($ser_result);

					echo "<b>Название:</b> $row[5]<br><b>Издатель:</b> $pub_row[0]<br><b>Торговая площадка:</b> $tm_row[0]<br><b>Серия:</b> $ser_row[0]<br><b>Язык:</b> $lng_row[0]<br><b>ОС:</b> $os_row[0]<br><b>Дата:</b> $row[6]<br><b>Оценка:</b> $row[7]<br><b>Системные требования:</b> $row[9]<br><b>Жанр:</b> $row[12]<br><b>Цена:</b> $row[13]<br><b>Поддержка мультиплеера:</b> ";
					if ($row[10] == 1) echo "да<br>";
					else echo "нет<br>";
					echo "<b>Поддержка геймпада:</b> ";
					if ($row[11] == 1) echo "да";
					else echo "нет";

						
					mysqli_free_result($result);
				}
					 
				mysqli_close($link);
			?>
			</div>
			</div>
		
		</div>
	</body>
</html>