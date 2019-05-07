<?php


class Show {
	
	public $post;
	
	public function search($post){
		$postVal = $this->post = $post;
		$exploded = explode(",", $postVal['dict']);
		$searchWord = $postVal['txtShow'];
		$find = str_replace('?', '(.*)', $searchWord);
		preg_match_all ("/$find/U", implode('',$exploded), $matches);
		echo "Output: <br>";
		echo count($matches[0]);

	}
	
}

$obj = new Show();
$obj->search($_POST);