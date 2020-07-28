<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?>
<div class="container">

<?

$promos = array ('006296133223557380130554',
'995034649154704697608177',
'884879811656347399695072',
'774580105330659769370657',
'665117881146796781416636',
'556666000673632071029589',
'449926092343580839700840',
'336234835908224026171448',
'227332791315547896107177',
'120060408696846658083780',
'117316054006857088202775');

$i = 0;
while (count($promos) > $i) {
$coupon = $promos[$i];
$results_insert = $DB->Query("INSERT INTO b_sale_discount_coupon VALUES ('', '24', 'Y', NULL, NULL, '$coupon', '2', '1', '0', '0', NULL, 'CURRENT_DATE()', '4307', 'CURRENT_DATE()', '4307', '');");
echo $promos[$i]."<br>";
$i++;

}

echo "<pre>";
//print_r($promos);
echo "</pre>";

?>

</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>