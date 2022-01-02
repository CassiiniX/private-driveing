<?php 

function make_star($star){
	$theStar  = "";

	try{ 	
	  	if($star == 0){
	  		for($i=0;$i<5;$i++){  		
	  			$theStar .= "<i class='fas fa-star'></i> ";
  			}
  		}else{
				for($i=0;$i<$star;$i++){
					$theStar .= "<i class='fas fa-star' style='color:gold'></i> ";
				}		

				$remainStar = 5-$star;

				for($i=0;$i<$remainStar;$i++){
					$theStar .= "<i class='fas fa-star'></i> ";
				}       		
  		}

  		return $theStar;
  	}catch(\Exception $e){
  		for($i=0;$i<5;$i++){  		
	  		$theStar .= "<i class='fas fa-star'></i> ";
  		}
  		
  		return $theStar;
  	}
}