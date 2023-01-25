<?

echo "test!</br>";
$banip = array('127.0.0.1','127.0.0.2','?27.0.0.3,','::1');//определяем массив адресов. можно подключить и файл

$ip = $_SERVER['REMOTE_ADDR'];//получаем ip подключившегося

//циклом проходимся по всем записям массива
echo $_SERVER['REMOTE_ADDR'];
echo "<br>";
for($i=0;$i<4;$i++){
	if($ip == $banip[$i]){ //если найдены совпадения то говорим, что пользователь забанен

		echo "You are currently banned from this website, sorry!";
		exit();
	}

	else{

	//а тут у нас всё хорошо и бана нет =)

	echo "no match<br>";

	}

}

?>