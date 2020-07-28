<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Used list coupons");
?>

<div class="container">

<?

$couponList = \Bitrix\Sale\Internals\OrderCouponsTable::getList(array(
    'select' => array('COUPON')//,
    //'filter' => array('=ORDER_ID' => ID_заказа) // посмотреть в определенном заказе
));

		$i = 0;

while ($coupon = $couponList->fetch())
{
	$first_chars = substr($coupon['COUPON'], 0, 2);

		if ($first_chars == '00' || $first_chars == '11' || $first_chars == '22' || $first_chars == '33' || $first_chars == '44' || $first_chars == '55' || $first_chars == '66' || 
		$first_chars == '77' || $first_chars == '88' || $first_chars == '99' || $first_chars == '12') {

		echo $i.". ".$coupon['COUPON']." chars: ".$first_chars."<br>";

		$code[] = $coupon['COUPON'];

		$i++;

		}
}


/* **************************************** */
/*
echo "<pre>";
print_r($code);
echo "</pre>";
*/
 //Creates XML string and XML document using the DOM 
    $dom = new DomDocument('1.0', 'UTF-8'); 

    //add root == jukebox
    $jukebox = $dom->appendChild($dom->createElement('used_coupons'));

    for ($i = 0; $i < count($code); $i++) {

		$track = $dom->createElement('coupon');
        $jukebox->appendChild($track);

		$attr = $dom->createAttribute('code');
        $attr->appendChild($dom->createTextNode($code[$i]));
        $track->appendChild($attr);

    }

    $dom->formatOutput = true; // set the formatOutput attribute of domDocument to true

    // save XML as string or file 
    $test1 = $dom->saveXML(); // put string in test1
$dom->save('/var/www/sibirix2/data/www/ohotaktiv.ru/obmen_files/promo/used_coupons.xml'); // save as file

?>

</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>