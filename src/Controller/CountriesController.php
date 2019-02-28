<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Countries Controller
 *
 * @property \App\Model\Table\CountriesTable $Countries
 */
class CountriesController extends AppController
{

   
	
	public function countryCode($val = null)
    {   $this->layout='ajax';
	    $this->autoRender = false;
		if ($this->request->is('ajax')) {
			$value=@explode("##",$val);
			
			
	if(isset($value[0]) and $value[0]!='') {
        $country = $this->Countries->find()->select(['code'])->where(['id'=>$value[0]])->toArray();
        echo isset($country[0]['code'])? '+'.$country[0]['code']:'';
		
	}
		} 
	else {
		echo "404 page not found";
		}
	
    }

    
}
