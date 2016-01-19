<?php 
#error_reporting(E_ALL);
#ini_set("display_errors", 1);

/**
 * This script used to get products from vinhphatmobile
 * 
 * Author: HuyCD
 * Email: chaudanghuy@gmail.com
 * 
 * Images save to folder [products]
*/

$target_url = 'http://vinhphatmobile.com/iphone/';

/* list target urls */
$target_urls = array(
'7' => 'http://vinhphatmobile.com/iphone/',
'12' => 'http://vinhphatmobile.com/kho-may-cu-iphone/',
'11' => 'http://vinhphatmobile.com/phu-kien/page-2/',
'10' => 'http://vinhphatmobile.com/may-tinh-bang/',
'9' => 'http://vinhphatmobile.com/dien-thoai/',
'8' => 'http://vinhphatmobile.com/ipad/',
'13' => 'http://vinhphatmobile.com/macbook/',
'14' => 'http://vinhphatmobile.com/apple-watch/',
);

include_once('simple_html_dom.php');

/* Save to posts */ 
$posts = array();

echo "Crawl data vinhphatmobile\n";

$html = new simple_html_dom();

foreach($target_urls as $cat_id => $target_url){
$html->load_file($target_url);

if($html->find('div[class=ty-column5]')) {
foreach($html->find('div[class=ty-column5]') as $post)
{
$title = strip_tags($post->find('a[class=product-title]',0)->outertext);
$slug = slugify($title);
$category_id = $cat_id;
$link = $post->find('a',0)->href;

if(!empty($title)) {
/** Store image in local **/
//$url= $post->find('img',0)->outertext;
//$imagePath = $post->find('img',0)->outertext;
$url= $post->find('img',0)->src;

$path = 'products/'.$slug.'.jpg';

file_put_contents($path , file_get_contents($url));

$image = $slug . '.jpg';
/* End image */

$price = $sale_price = strip_tags(str_replace('.','',$post->find('span[class=ty-price-num]',0)->outertext));

///// get description & detail /////////////////
$htmlDetail = new simple_html_dom();

$htmlDetail->loadFile($link);

$description = strip_tags($htmlDetail->find('div[class=ty-wysiwyg-content]',0)->outertext);

$imageMainName = time('now').rand();
foreach($htmlDetail->find('div[id=content_description]') as $e)
{
  $detail = $e->innertext;

  // Loop image
  $i = 1;
  foreach ($e->find('img') as $img) {
    $imageName = $imageMainName.$i;
    $imageDetail = $img->src;

    $imageContent = file_get_contents($imageDetail);

    file_put_contents('products/'.$imageName.'.jpg', $imageContent);

    $detail = str_replace($imageDetail, 'http://www.ducngoco2.com/img/products/'.$imageName.'.jpg', $detail);

    $i++;
  }
}
///////////////////////////////////////////////

$is_delete = 0;

$posts[] = array(
 $title, $slug, $category_id, $image, $price, $sale_price, $description, $detail, $is_delete
);

}
}
}

if($html->find('div[class=ty-column6]')) {
foreach($html->find('div[class=ty-column6]') as $post)
{
$title = strip_tags($post->find('a[class=product-title]',0)->outertext);
$slug = slugify($title);
$category_id = $cat_id;
$link = $post->find('a',0)->href;

if (!empty($title)) {
/** Store image in local **/
//$url= $post->find('img',0)->outertext->src;
$url= $post->find('img',0)->src;

$path = 'products/'.$slug.'.jpg';

file_put_contents($path , file_get_contents($url));

$image = $slug . '.jpg';
/* End image */

$price = $sale_price = strip_tags(str_replace('.','',$post->find('span[class=ty-price-num]',0)->outertext));

///// get description & detail /////////////////
$htmlDetail = new simple_html_dom();

$htmlDetail->loadFile($link);

$description = strip_tags($htmlDetail->find('div[class=ty-wysiwyg-content]',0)->outertext);

$imageMainName = time('now').rand();
foreach($htmlDetail->find('div[id=content_description]') as $e)
{
  $detail = $e->innertext;

  // Loop image
  $i = 1;
  foreach ($e->find('img') as $img) {
    $imageName = $imageMainName.$i;
    $imageDetail = $img->src;

    $imageContent = file_get_contents($imageDetail);

    file_put_contents('products/'.$imageName.'.jpg', $imageContent);

    $detail = str_replace($imageDetail, 'http://www.ducngoco2.com/img/products/'.$imageName.'.jpg', $detail);

    $i++;
  }
}
///////////////////////////////////////////////

$is_delete = 0;

$posts[] = array(
 $title, $slug, $category_id, $image, $price, $sale_price, $description, $detail, $is_delete
);

}
}
}

if($html->find('div[class=ty-column4]')) {
foreach($html->find('div[class=ty-column4]') as $post)
{
$title = strip_tags($post->find('a[class=product-title]',0)->outertext);
$slug = slugify($title);
$category_id = $cat_id;

if (!empty($title)) {
/** Store image in local **/
//$url= $post->find('img',0)->outertext->src;
$url= $post->find('img',0)->src;

$path = 'products/'.$slug.'.jpg';

file_put_contents($path , file_get_contents($url));

$image = $slug . '.jpg';
/* End image */

$link_to_product = $post->find('a',0)->href;

$price = $sale_price = strip_tags(str_replace('.','',$post->find('span[class=ty-price-num]',0)->outertext));

///// get description & detail /////////////////
$htmlDetail = new simple_html_dom();

$htmlDetail->loadFile($link_to_product);

$description = strip_tags($htmlDetail->find('div[class=ty-wysiwyg-content]',0)->outertext);

$imageMainName = time('now').rand();
foreach($htmlDetail->find('div[id=content_description]') as $e)
{
  $detail = $e->innertext;

  // Loop image
  $i = 1;
  foreach ($e->find('img') as $img) {
    $imageName = $imageMainName.$i;
    $imageDetail = $img->src;

    $imageContent = file_get_contents($imageDetail);

    file_put_contents('products/'.$imageName.'.jpg', $imageContent);

    $detail = str_replace($imageDetail, 'http://www.ducngoco2.com/img/products/'.$imageName.'.jpg', $detail);

    $i++;
  }
}
///////////////////////////////////////////////

$is_delete = 0;

$posts[] = array(
 $title, $slug, $category_id, $image, $price, $sale_price, $description, $detail, $is_delete
);   
}
}
}

//sleep(5);
}

/** Store image in local **/
/*
$url= 'http://vinhphatmobile.com/images/thumbnails/220/220/detailed/7/6s_plus_full.jpg?t=1443690511';

$path = 'image/6s plus.jpg';

file_put_contents($path , file_get_contents($url));
*/

/** Export excel file **/
require_once 'PHPExcel.php';

$objPHPExcel = new PHPExcel();

$objPHPExcel->setActiveSheetIndex(0); 

$objPHPExcel->getActiveSheet()->setCellValue('A1', 'title');
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'slug');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'category_id');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'image');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'price');
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'sale_price');
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'description');
$objPHPExcel->getActiveSheet()->setCellValue('H1', 'detail');
$objPHPExcel->getActiveSheet()->setCellValue('I1', 'is_delete');

$i = 2;

ksort($posts);

foreach($posts as $post) {
  $objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $post[0]);
  $objPHPExcel->getActiveSheet()->setCellValue('B'. $i, $post[1]);
  $objPHPExcel->getActiveSheet()->setCellValue('C'. $i, $post[2]);
  $objPHPExcel->getActiveSheet()->setCellValue('D'. $i, $post[3]);
  $objPHPExcel->getActiveSheet()->setCellValue('E'. $i, $post[4]);
  $objPHPExcel->getActiveSheet()->setCellValue('F'. $i, $post[5]);
  $objPHPExcel->getActiveSheet()->setCellValue('G'. $i, $post[6]);
  $objPHPExcel->getActiveSheet()->setCellValue('H'. $i, $post[7]);
  $objPHPExcel->getActiveSheet()->setCellValue('I'. $i, $post[8]);

  $i++;
}



//$objWriter = new PHPExcel_Writer_Excel2007($objPHPExcel); 
$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
// Write the Excel file to filename some_excel_file.xlsx in the current directory
$objWriter->save('products.xls'); 

echo "Done \n";

exit();


function slugify($text)
{ 
  // replace non letter or digits by -
  $text = preg_replace('~[^\\pL\d]+~u', '-', $text);

  // trim
  $text = trim($text, '-');

  // transliterate
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

  // lowercase
  $text = strtolower($text);

  // remove unwanted characters
  $text = preg_replace('~[^-\w]+~', '', $text);

  if (empty($text))
  {
    return 'n-a';
  }

  return $text;
}

?>
