<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("my generate");
?>

<div class="container">

<?
$chars = '12345ABCDEFGHIJKLMNOPQRSTUVWXYZ67890';
$hashpromo = '';
for($ichars = 0; $ichars < 9; ++$ichars) {
    $random = str_shuffle($chars);
    $hashpromo .= $random[0];
}
$hashpromo = 'OSHIMA-'.$hashpromo;
echo $hashpromo;
?>

</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>