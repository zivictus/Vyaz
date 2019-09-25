<!DOCTYPE html>

<html lang="ru">

	<head>

		<meta charset="utf-8">
		<meta name="yandex-verification" content="8acc49cefdb2350a" />

		<title>Игровая библиотека</title>

		<link rel="stylesheet" href="css/main.css" type="text/css">
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
		require_once 'connection.php';
			
		$link = mysqli_connect($host, $user, $password, $database);
		
		$gameName_select ="SELECT Name FROM Game ORDER BY Name";
		$gameName_select_result = mysqli_query($link, $gameName_select);
		$gameName_rows = mysqli_num_rows($gameName_select_result);
		
		$publisherName_select ="SELECT Id,Name FROM Publisher ORDER BY Name";
		$publisherName_select_result = mysqli_query($link, $publisherName_select);
		$publisherName_rows = mysqli_num_rows($publisherName_select_result);
		
		$genreName_select ="SELECT Id,Name FROM Genre ORDER BY Name";
		$genreName_select_result = mysqli_query($link, $genreName_select);
		$genreName_rows = mysqli_num_rows($genreName_select_result);
		
		function loop_for_select($select_rows, $select_result)
			{
				for ($i = 0 ; $i < $select_rows ; ++$i)
					{
						$fetched_row = mysqli_fetch_row($select_result);
						echo "<option value=\"$fetched_row[0]\">$fetched_row[1]</option>";
					}
			}
	?>
	

		<div class="wrapper">

			<div class="content">

				<header>

					<div id="logo">

						<a href="https://arkhgamedb.000webhostapp.com/" title="На главную">

							<img src="imgs/logo.png" title="GameLib.com" alt="GameLib.com">

							<h1>Игровая библиотека</h1>

						</a>

					</div>

<!-- Put this script tag to the place, where the Share button will be -->
					<div class="vijet">
						<script>
						document.write(VK.Share.button({url: "http://https://arkhgamedb.000webhostapp.com/"},{type: "custom", text: "<img src=\"https://vk.com/images/share_32.png\" width=\"32\" height=\"32\" />"}));
						</script>		
					</div>

				</header>

				

				<nav>
				
					<a href="index.php">Главная</a>

					<a href="News.php">Новости</a>

					<a href="Facts.php">Интересные факты</a>
					
					<a href="Intersting.php">Это может быть интересно</a>
					
					<a href="Servises.php">Сервисы</a>
					
					<a href="Xml_page.php">XML</a>
					
					<div class="dropdown">
						<button class="dropbtn">Приложение</button>
						<div class="dropdown-content">

							<a href="adding_menu.php">Добавить запись</a>

							<a href="search_menu.php">Поиск</a>

							<a href="stat.php">Статистика</a>
							
						  </div>
					</div>
					
					<a style="float:right" href="Contacts.php">Контакты</a>

					<div class="ya-site-form ya-site-form_inited_no" data-bem="{&quot;action&quot;:&quot;https://arkhgamedb.000webhostapp.com/&quot;,&quot;arrow&quot;:false,&quot;bg&quot;:&quot;#007fff&quot;,&quot;fontsize&quot;:12,&quot;fg&quot;:&quot;#000000&quot;,&quot;language&quot;:&quot;ru&quot;,&quot;logo&quot;:&quot;rb&quot;,&quot;publicname&quot;:&quot;Поиск&quot;,&quot;suggest&quot;:true,&quot;target&quot;:&quot;_self&quot;,&quot;tld&quot;:&quot;ru&quot;,&quot;type&quot;:2,&quot;usebigdictionary&quot;:true,&quot;searchid&quot;:2358340,&quot;input_fg&quot;:&quot;#000000&quot;,&quot;input_bg&quot;:&quot;#ffffff&quot;,&quot;input_fontStyle&quot;:&quot;normal&quot;,&quot;input_fontWeight&quot;:&quot;normal&quot;,&quot;input_placeholder&quot;:&quot;Поиск по сайту&quot;,&quot;input_placeholderColor&quot;:&quot;#000000&quot;,&quot;input_borderColor&quot;:&quot;#7f9db9&quot;}"><form action="https://yandex.ru/search/site/" method="get" target="_self" accept-charset="utf-8"><input type="hidden" name="searchid" value="2358340"/><input type="hidden" name="l10n" value="ru"/><input type="hidden" name="reqenc" value=""/><input type="search" name="text" value=""/><input type="submit" value="Найти"/></form></div><script>(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0],e=d.documentElement;if((' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1){e.className+=' ya-page_js_yes';}s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Form.init()})})(window,document,'yandex_site_callbacks');</script>
				</nav>
				
				<div class="frame">
						<iframe name="CONTENT" align="right" width="59%" height="1300"></iframe>
				</div>
				
				<div class="list_of_pop_games">
					<form target="CONTENT" method="POST">
					
						<label for="gameName">Поиск игры по названию</label>
						<select name="gameName" required>							
						<?php 
							for ($i = 0 ; $i < $gameName_rows ; ++$i)
							{
								$fetched_row = mysqli_fetch_row($gameName_select_result);
								echo "<option value=\"$fetched_row[0]\">$fetched_row[0]</option>";
							} 
						?>	
						</select>						
						<input type="submit" value="Поиск" formnovalidate formaction="search_game_by_name.php"><p>	
						
						<label for="pubName">Поиск игры по производителю</label>
						<select name="pubName" required>							
						<?php 
							for ($i = 0 ; $i < $publisherName_rows ; ++$i)
							{
								$fetched_row = mysqli_fetch_row($publisherName_select_result);
								echo "<option value=\"$fetched_row[0]\">$fetched_row[1]</option>";
							} 
						?>	
						</select>						
						<input type="submit" value="Поиск" formnovalidate formaction="search_game_by_publisher.php"><p>	
						
						<h3>Поиск по двум аттрибутам</h3>
						<label for="genreName">Жанр</label>
						<select name="genreName" required>							
						<?php 
							for ($i = 0 ; $i < $genreName_rows ; ++$i)
							{
								$fetched_row = mysqli_fetch_row($genreName_select_result);
								echo "<option value=\"$fetched_row[0]\">$fetched_row[1]</option>";
							} 
						?>	
						</select>						
						<input type="submit" value="Далее" formnovalidate formaction="search_game_by_attributes.php"><p>
						
					</form>
				</div>
				
				<div id="ya-site-results" data-bem="{&quot;tld&quot;: &quot;ru&quot;,&quot;language&quot;: &quot;ru&quot;,&quot;encoding&quot;: &quot;&quot;,&quot;htmlcss&quot;: &quot;1.x&quot;,&quot;updatehash&quot;: true}"></div><script>(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0];s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Results.init();})})(window,document,'yandex_site_callbacks');</script>
			</div>

			<footer>
			
				<!-- Yandex.Metrika informer -->
				<a href="https://metrika.yandex.ru/stat/?id=55336117&amp;from=informer"
				target="_blank" rel="nofollow"><img src="https://informer.yandex.ru/informer/55336117/3_0_209FFFFF_007FFFFF_1_pageviews"
				style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" class="ym-advanced-informer" data-cid="55336117" data-lang="ru" /></a>
				<!-- /Yandex.Metrika informer -->

				<!-- Yandex.Metrika counter -->
				<script>
				   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
				   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
				   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

				   ym(55336117, "init", {
						clickmap:true,
						trackLinks:true,
						accurateTrackBounce:true
				   });
				</script>
				<noscript><div><img src="https://mc.yandex.ru/watch/55336117" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
				<!-- /Yandex.Metrika counter -->
			
				<script  src="https://vk.com/js/api/openapi.js?162"></script>
				<!-- VK Widget -->
				<div class="vijet">
					<div id="vk_subscribe"></div>
					<script>
					VK.Widgets.Subscribe("vk_subscribe", {}, 203472520);
					</script>
				</div>
								
			</footer>

		</div>

	</body>

</html>