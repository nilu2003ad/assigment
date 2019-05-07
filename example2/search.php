<?php
class Show {
	public $post;
	
	public function search($post){
		
		$postVal = $this->post = $post;
		
		for($i=1; $i<=$postVal['dict']; $i++) {
			$dictText = $postVal['dictText'.$i];
			$searchWord = $postVal['searchWord'.$i];
			$c = $postVal['c'.$i];
			$position = $postVal['position'.$i];
			
			/* Searching within the given string */
			$find = strpos("$dictText","$searchWord");
			if($c === 'Y') {
				if($position === '0') {
					echo $find . '<br>';
				} else {
					if($position === $find) {
						echo $find  . '<br>';
					} else {
						echo "No Worries" . '<br>';
					}
				}
			} else {
				$currenctWord = substr($dictText, $position);
				$find = strpos("$currenctWord","$searchWord");
				echo $find + $position  . '<br>';
			}
		}
		
	}
}

$obj = new Show();
$obj->search($_POST);

?>