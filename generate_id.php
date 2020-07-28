<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("cart_rules");
?>

<div class="container">

<?

$content = file ('real10percent.txt');
foreach ($content as $line) { // читаем построчно
    $result = explode (',', $line); // разбиваем строку и записываем в массив
	/*
echo "<pre>";
print_r($result);
	echo "</pre>";
*/
}

$codes = $result;

$i = 0; //start i = 0
$reload = $_GET['r'];

/* *** */

$all_items = count($codes);

$end = $all_items; //$all_items;
$step = 10;

echo "all items: ".$all_items."<br>";

$idid = [];

while ($end > $i) {

	$code = $codes[$i];

	$results = $DB->Query("SELECT IBLOCK_ELEMENT_ID FROM b_iblock_element_property WHERE VALUE IN (".implode(',',$codes).") AND DESCRIPTION='Код'");

		while ($row = $results->Fetch())
		{
			$res = CIBlockElement::GetList(array(), array('IBLOCK_ID' => 10, 'ID' => $row['IBLOCK_ELEMENT_ID'], 'SITE_ID' => "s1"));
			$item = $res->Fetch();
			if (!empty($item['ID']) && $item['ACTIVE'] = 'Y') { 

				$fp = fopen("/home/h911249072/web-ohotaktiv.online/docs/12dev/promo/id10pers_ids.txt", "a");
				$text = "'".$item['ID']."',"; 
				fwrite($fp, $text. PHP_EOL);
				$idid .= $item['ID'];

			}
		}
$i++;
}

echo "<br>";

/*echo "<pre>";
print_r($row);
echo "</pre>";*/
?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>