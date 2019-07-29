<?php

namespace App\Helpers;

class AppHelper
{
    public static function instance()
    {
        return new AppHelper();
    }

    public function rupiah($price)
    {
        $rupiah = number_format($price,0,',','.');
        return $rupiah;
    }
    // public function categoryFilter($categoryId,$category=null){
    // 	$state=null;
    // 		if(!empty($category)){
    // 			if($categoryId != $category){
    // 				$state = '';
    // 			}
    // 		}
    // 	return $state;
    // }
}