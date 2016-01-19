<?php

/* list target urls */
$target_urls = array(
// '7' => 'http://vinhphatmobile.com/iphone/',
// '12' => 'http://vinhphatmobile.com/kho-may-cu-iphone/',
//'11' => 'http://vinhphatmobile.com/phu-kien/page-2/',
// '10' => 'http://vinhphatmobile.com/may-tinh-bang/',
// '9' => 'http://vinhphatmobile.com/dien-thoai/',
// '8' => 'http://vinhphatmobile.com/ipad/',
// '13' => 'http://vinhphatmobile.com/macbook/',
// '14' => 'http://vinhphatmobile.com/apple-watch/',
'15' => 'http://www.bongda365.com.vn/cat/bong-da-anh/ngoai-hang-anh/',
);

include_once('simple_html_dom.php');

$html = new simple_html_dom();

foreach($target_urls as $url) {
	$html->loadFile($url);

	$i = 1;
	foreach($html->find('article') as $post)
	{
		$title = strip_tags($post->find('h2[class=entry-title]',0)->outertext);

		$link = $post->find('a',0)->href;

		$description = '';

		// TO DO as last
		$html1 = new simple_html_dom();
		$html1->loadFile($link);

		foreach($html1->find('div[class=entry-summary]') as $e) 
		{
			// if find image
			// save image to local folder
			// replace image href
			if (!empty($e->find('img',0)->src)) {
				echo $title . " = " . $e->find('img',0)->src. "<br>";
			}

			$description .= $e->innertext;
		}
		
		$posts[] = array($title, $link, $description);

		$i++;
	}		

}


$posts = array_reverse($posts);

echo "<table border='1'>
		<tr>
			<td>title</td>
			<td>link</td>
			<td>description</td>
		</tr>
	 ";

foreach ($posts as $key => $value) {
	echo "<tr>
			<td>".$value[0]."</td>
			<td>".$value[1]."</td>
			<td>".$value[2]."</td>
		  </tr>";
}

echo "</table>";