<!DOCTYPE html>
<html>
<head>
	<title>#Para</title>
</head>
<body>
<?php

	class Info{

		public function Form(){
echo <<<HERE
			<div style='border: 2px solid black'>
			<form action="#" method="post">
				<input type='text' name='text1'><label>Текст №1</label>
				<input type='text' name='text2'><label>Текст №2</label>
				<input type='text' name='text3'><label>Текст №3</label>
				<input type='text' name='text4'><label>Текст №4</label>
				<input type='file' name ='image'><label>Картинка</label> 
				<input type='submit' name='otvet'>
			</form>
			</div>
HERE;
		}
		public function search(){

			
			
			if (!empty($_POST['text1']) && !empty($_POST['text2']) && !empty($_POST['text3']) && !empty($_POST['text4']) && !empty($_POST['image']) && !empty($_POST['otvet']) )
			{
				$this -> Result($_POST['text1'], $_POST['text2'] , $_POST['text3'], $_POST['text4'], $_POST['image']);
			}
			else
			{
				$this -> Form();
			}

		}

		

		public function Result($text1,$text2,$text3,$text4,$image){

echo <<<HERE
				$text1<br>$text2<br>$text3<br>$text4<br><img src='$image'>
HERE;

		}
	}

	$class = new Info();
	$class -> search();
	// $class ->search();
?>
</body>
</html>