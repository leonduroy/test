<html>
	<head>
		<style>
			body {
				width: 500px;
				margin: 10px auto;
			}
			
			img {
				width: 100%;
			}
			
			textarea {
				width: 100%;
			}
			
			#comments {
				position: relative;
				border: solid 1px;
				margin: 10px 0;
			}
			
			#comments p {
				margin: 0;
			}
			
			.dt {
				position: absolute;
				top: 0;
				right: 0;
			}
		</style>
	</head>
	
	<body>
		<img src="image.jpg">
		
		<form name="comment" action="comment.php" method="post">
			<p>
				<label>Имя:</label>
				<input type="text" name="name" />
			</p>
			
			<p>
				<?php
					$a = rand(0, 9);
					$b = rand(0, 9);
					
					echo $a . ' + ' . $b . ' = ';
					echo "<input type='hidden' name='a' value='" . $a . "' />";
					echo "<input type='hidden' name='b' value='" . $b . "' />";
				?>
				<input type="text" name="captcha" />
			</p>
			
			<p>
				<label>Текст комментария:</label>
				<br>
				<textarea name="text" cols="40" rows="5"></textarea>
			</p>
			
			<p>
				<input type="submit" value="Добавить комментарий." />
			</p>
		</form>
		
		<?php
			$connect = new mysqli('localhost', 'root', '', 'test');
			$result = $connect->query('SELECT * FROM comments ORDER BY id DESC');
			
			while ($row = $result->fetch_assoc()) {
				echo "<div id='comments'>";
					echo '<p>' . $row['name'] . '</p>';
					echo "<p class='dt'>" . $row['dt'] . '</p><br />';
					echo '<p>' . $row['text'] . '</p><br />';
					echo	"<form action='delete.php' method='post'>
								<input type='hidden' name='id' value='" . $row['id'] . "' />
								<input type='submit' value='Удалить комментарий.'>
							</form>";
				echo '</div>';
			}
			
			$connect->close();
		?>
	</body>
</html>