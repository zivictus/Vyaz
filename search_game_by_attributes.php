<html lang="ru">

	<head>

		<meta charset="utf-8">
		<meta name="yandex-verification" content="8acc49cefdb2350a" />

		<title>Игровая библиотека</title>

		<link rel="stylesheet" href="css/main.css" type="text/css">
		<link rel="stylesheet" href="css/description.css" type="text/css">
		<link rel="stylesheet" href="css/adding_menu.css" type="text/css">

		
		<script src="https://vk.com/js/api/openapi.js?162"></script>
		<script src="https://vk.com/js/api/share.js?95"></script>
		<script async src="https://cse.google.com/cse.js?cx=013547437862958365309:qzbstjt9zxc"></script>
		<!--<div class="gcse-search"></div>-->

		<link rel="shortcut icon" href="imgs/book.ico">

	

		<meta name="keywords" content="game, library, игры, бибиилотека, игровая">

		<meta name="viewport" content="width=device-width, initial-scale=1">

	</head>
	<body>
	
		<?php
			if (isset($_POST['genreName']))
			{
				require_once 'connection.php'; 

				$link = mysqli_connect($host, $user, $password, $database);
								 
				$genre_post = $_POST['genreName'];
								 
				$genre_select ="SELECT Publisher FROM Game WHERE Genre = '$genre_post'";
				$genre_result = mysqli_query($link, $genre_select);
				$genre_rows = mysqli_num_rows($genre_result);
			}
			
		
		?>

		<div class="wrapper">

			<div class="content">
			<div class='list'>
				<form method="POST">
					<label for="secondAttribute">Второй аттрибут</label>
					<select name="secondAttribute" required>							
					<?php 
						for ($i = 0 ; $i < $genre_rows ; ++$i)
						{
							$genre_row = mysqli_fetch_row($genre_result);
							
							$pub_query ="SELECT Id,Name FROM Publisher WHERE Id = '$genre_row[0]'" ;
							$pub_result = mysqli_query($link, $pub_query) or die("Ошибка2 " . mysqli_error($link));
							$pub_row = mysqli_fetch_row($pub_result);
			
							echo "<option value=\"$pub_row[0]\">$pub_row[1]</option>";
						} 
					?>	
					</select>						
					<input type="submit" value="Поиск"><p>	
					<input type=hidden name=genreName value="<?=$_POST['genreName'];?>" >
				</form>
			</div>
			 <?php
			 
				if (isset($_POST['secondAttribute']))
				{
					$search = $_POST['secondAttribute'];
					$search = trim($search);
					$search = strip_tags($search);        
					
					$query ="SELECT * FROM Game WHERE Publisher = '$search' AND Genre = '$genre_post'" ;
						 
					$result = mysqli_query($link, $query) or die("Ошибка2 " . mysqli_error($link));
					if($result)
					{
						$rows = mysqli_num_rows($result);
						
						echo "<table border=\'1\'><tr><th>Название:</th><th>Издатель:</th> <th>Торговая площадка:</th> <th>Серия:</th> <th>Язык:</th> <th>ОС:</th> <th>Дата:</th> <th>Оценка:</th> <th>Системные требования:</th> <th>Жанр:</th> <th>Цена:</th> <th>Поддержка мультиплеера:</th> ";
						echo "<th>Поддержка геймпада:</th></tr>";
						for ($i = 0 ; $i < $rows ; ++$i)
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

								
								
								echo "<tr><td>$row[5]</td><td>$pub_row[0]</td><td>$tm_row[0]</td><td>$ser_row[0]</td><td>$lng_row[0]</td><td>$os_row[0]</td><td>$row[6]</td><td>$row[7]</td><td>$row[9]</td><td>$row[12]</td><td>$row[13]</td>";
								if ($row[10] == 1) echo "<td>да</td>";
								else echo "<td>нет</td>";
								if ($row[11] == 1) echo "<td>да</td></tr>";
								else echo "<td>нет</td></tr>";
							}
						
						echo "</table>";
						
						

							
						mysqli_free_result($result);
					}
				}
				mysqli_close($link);
			 ?>
			 
			 
			</div>
		
		</div>
	</body>
</html>