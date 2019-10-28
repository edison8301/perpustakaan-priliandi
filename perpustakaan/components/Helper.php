<?php

namespace app\components;

class Helper
{
	public function getListBulan()
	{
		$list = [];
		for ($i=1; $i <= 12 ; $i++) { 

			$dateObj = \DateTime::createFromFormat('!m', $i);

			$monthName = $dateObj->format('F');

			$list[] = $monthName;
			# code...
		}
		return $list;
	}



	
}


