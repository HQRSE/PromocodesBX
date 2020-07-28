<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Add new coupons");
?>

<div class="container">

<?
use Bitrix\Main\Loader;
use Bitrix\Sale\DiscountCouponsManager;
CModule::IncludeModule("sale");

    $reader = new XMLReader();
    $reader->open('/var/www/sibirix2/data/www/ohotaktiv.ru/obmen_files/promo/coupons.xml'); // указываем ридеру что будем парсить этот файл
    // циклическое чтение документа
    while($reader->read()) {
        if($reader->nodeType == XMLReader::ELEMENT) {
            // если находим элемент <coupon>
            if($reader->localName == 'coupon') {
                $data = array();
                // считываем аттрибут code
                $data['code'] = $reader->getAttribute('code');

				$data['type'] = $reader->getAttribute('type');

				//$codes_from_1c[] =  $data['code']."<br>";

				$codeCoupon = $data['code']; //Код купона

				$segmentCoupon_xml = $data['type']; //Сегмент купона

				/*if ($segmentCoupon_xml == 1) {
						$rule = 30;
					} elseif ($segmentCoupon_xml == 2) {
						$rule = 31;
					} elseif ($segmentCoupon_xml == 3) {
						$rule = 32;
				}*/

				$archeck = DiscountCouponsManager::getData($codeCoupon,true);
				$archeck2 =	DiscountCouponsManager::getCheckCodeList(true);

				if ($archeck['ID'] > 0) {

					echo "issue<br>";

				} else {

/* ***************************** */

				$promos = array ($codeCoupon);

				$i = 0;

				while (count($promos) > $i) {
$coupon = $promos[$i];

$sel_ect = $DB->Query("SELECT * FROM b_sale_discount_coupon WHERE coupon='$coupon'");

while($row = $sel_ect->Fetch()){
    echo '<pre>'; print_r($row); echo '</pre>';
}


					$results_insert = $DB->Query("INSERT INTO b_sale_discount_coupon VALUES ('', '40', 'Y', NULL, NULL, '$coupon', '2', '1', '0', '0', NULL, 'CURRENT_DATE()', '4307', 'CURRENT_DATE()', '4307', '');");
					//$results_insert = $DB->Query("INSERT INTO b_sale_discount_coupon VALUES ('', '31', 'Y', NULL, NULL, '$coupon', '2', '1', '0', '0', NULL, 'CURRENT_DATE()', '4307', 'CURRENT_DATE()', '4307', '');");
					//$results_insert = $DB->Query("INSERT INTO b_sale_discount_coupon VALUES ('', '32', 'Y', NULL, NULL, '$coupon', '2', '1', '0', '0', NULL, 'CURRENT_DATE()', '4307', 'CURRENT_DATE()', '4307', '');");
					//echo $coupon." rule: ".$rule." seg: ".$segmentCoupon_xml."<br>";
					echo $coupon."<br>";
					$i++;

				}

/* ***************************** */

				}

            }
        }
    }
/*
echo "<pre>";
print_r($archeck);
echo "</pre>";

echo "<pre>";
print_r($archeck2);
echo "</pre>";

echo "<pre>";
print_r($promos);
echo "</pre>";
*/
?>

</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>