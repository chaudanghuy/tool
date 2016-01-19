<?php
/**
* File: News.php
* Xử lý nội dung số
* Author: HuyCD
*/

 class News {
 	public $conn; 	

 	// fetch data from url
 	public function listData() {

 	}

 	/**
 	 * Function listUrls
 	 * Liệt kê danh sách url sẽ lấy tin
 	*/
 	public function listUrls() {
 		$data = array();
 		$sql = "SELECT * FROM urls";

 		$result = $this->conn->query($sql);

 		if ($result->num_rows > 0) {
 			while($row = $result->fetch_assoc()) {
 				$data[] = array(
 						'site'	=>	$row['site'],
 						'url'	=>	$row['url'],
 						'people_id'	=>	$row['people_id'],
 						'date_created'	=>	$row['date_created'],
 					);
 			}
 		}

 		// Render view
 		ob_start();
 		require_once('../resources/template/medias/urls.php');
 		$content = ob_get_contents();
 		ob_end_clean();

 		echo $content;
 	}

 	public function editNew() {

 		$id = $_GET['id'];

 		if (empty($id)) {
 			die('Lỗi : Missing ID');
 		}

 		$new = $this->getNew($id);

 		if (!empty($_POST['submitBtn'])) {
 			if ($this->saveNew()) {
 				$message = 'Lưu OK ! Chỉnh sửa gì nữa không chế ơi';
 			}
 		}
		
 		// Render view
 		ob_start();
 		require_once('../resources/template/medias/edit_url.php');
 		$content = ob_get_contents();
 		ob_end_clean();

 		echo $content;
 	}

 	public function saveNew() {
 		extract($_POST);

 		$sql = "INSERT INTO urls(site, url, people_id, date_created) VALUES('$site','$url','$people_id','$date_created')";

 		return $this->conn->query($sql);
 	}


 }