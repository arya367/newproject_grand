<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;


/**
 * Properties Controller
 *
 * @property \App\Model\Table\PropertiesTable $Properties
 */
class PropertiesController extends AppController
{
   public $helpers = ['SetupEditor'];
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Builders', 'PropertyTypes', 'Locations']
        ];
        $this->set('properties', $this->paginate($this->Properties->find()->order(['Properties.id'=>'desc'])));
        $this->set('_serialize', ['properties']);
    }

    /**
     * View method
     *
     * @param string|null $id Property id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $property = $this->Properties->get($id, [
            'contain' => ['Builders', 'PropertyTypes', 'Locations']
        ]);
        $this->set('property', $property);
        $this->set('_serialize', ['property']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()  {
        $property = $this->Properties->newEntity();
        if ($this->request->is('post')) {
			
			if(!empty($this->request->data['url'])){ $url=strtolower($this->request->data['url']);$url2=@str_replace(" ","-",$url);$this->request->data['url']=$url2;}
			
			if(!empty($this->request->data['property_subtype_id'])){ $property_subtype_id=serialize($this->request->data['property_subtype_id']); $this->request->data['property_subtype_id']=$property_subtype_id;}
			else {$this->request->data['property_subtype_id']='';}
			
			if(!empty($this->request->data['tabs'])){ $tbs=serialize($this->request->data['tabs']); $this->request->data['tabs']=$tbs;}
			else {$this->request->data['tabs']='';}
			if(!empty($this->request->data['bhk'])){$bhks=serialize($this->request->data['bhk']); $this->request->data['bhk']=$bhks; }
			else {$this->request->data['bhk']='';}
			
			
            $property = $this->Properties->patchEntity($property, $this->request->data);
            if ($this->Properties->save($property)) {
				$this->createXml();
                $this->Flash->success('The property has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The property could not be saved. Please, try again.');
            }
        }
        $builders = $this->Properties->Builders->find('list');
        $propertyTypes = $this->Properties->PropertyTypes->find('list');
        $locations = $this->Properties->Locations->find('list');
        //$propertypeLocations = $this->Properties->PropertypeLocations->find('list');
		$propertypeSublocations = $this->Properties->PropertypeSublocations->find('list');
        $propertySubtypes = $this->Properties->PropertySubtypes->find('list');
        $sectors = $this->Properties->Sectors->find('list');
		
        $this->set(compact('property', 'builders', 'propertyTypes', 'locations', 'propertypeLocations', 'propertySubtypes', 'sectors', 'propertypeSublocations'));
        $this->set('_serialize', ['property']);
		
    }

    /**
     * Edit method
     *
     * @param string|null $id Property id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)  {
        $property = $this->Properties->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
			
			if(!empty($this->request->data['url'])){ $url=strtolower($this->request->data['url']);$url2=@str_replace(" ","-",$url);$this->request->data['url']=$url2;}
		
			if(!empty($this->request->data['property_subtype_id']))
			{ 
			
			$property_subtype_id=serialize($this->request->data['property_subtype_id']); $this->request->data['property_subtype_id']=$property_subtype_id;}
			else {$this->request->data['property_subtype_id']='';
			
			}
		
			if(!empty($this->request->data['tabs']))
			{ 
			$tbs=serialize($this->request->data['tabs']); $this->request->data['tabs']=$tbs;
			}
		
		    else 
			{
				$this->request->data['tabs']='';
				
				}
		
			if(!empty($this->request->data['bhk']))
			{
				$bhks=serialize($this->request->data['bhk']); $this->request->data['bhk']=$bhks; 
				}
			else 
			{
				$this->request->data['bhk']='';
			
			}
		
            $property = $this->Properties->patchEntity($property, $this->request->data);
			
			
            if ($this->Properties->save($property)) {
				$this->createXml();
                $this->Flash->success('The property has been saved.');
                return $this->redirect(['action' => 'edit',$id]);
            } else {
                $this->Flash->error('The property could not be saved. Please, try again.');
            }
        }
		
        $builders = $this->Properties->Builders->find('list');
        $propertyTypes = $this->Properties->PropertyTypes->find('list');
        $locations = $this->Properties->Locations->find('list');
       // $propertypeLocations = $this->Properties->PropertypeLocations->find('list');
	    $propertypeSublocations = $this->Properties->PropertypeSublocations->find('list')->where(['location_id =' => $property['location_id']]);
        $propertySubtypes = $this->Properties->PropertySubtypes->find('list');
        $sectors = $this->Properties->Sectors->find('list')->where(['location_id =' => $property['location_id']]);
        $this->set(compact('property', 'builders', 'propertyTypes', 'locations', 'propertypeLocations', 'propertySubtypes', 'sectors','propertypeSublocations'));
        $this->set('_serialize', ['property']);
		
    }
	
	/**
     * SEO method
     *
     * @param string|null $id Property id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	
	public function seo($id = null) {
		$property = $this->Properties->get($id, [
            'contain' => [],
			'fields'=>['seo_title', 'seo_description', 'seo_keyword','id','specification_title','specification_description','location_title','location_description','pricelist_title','pricelist_description','masterplan_title','masterplan_description','siteplan_title','siteplan_description','floorplan_title','floorplan_description','gallery_title','gallery_description']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
		$property = $this->Properties->patchEntity($property, $this->request->data);
		//print_r($property); exit;
            if ($this->Properties->save($property)) {
				$this->Flash->success('The seo has been saved');
				$this->redirect(array('action' => 'seo',$id));
			} else {
				$this->Flash->error('The seo could not be saved. Please, try again.');
			}
		} 
		
		
		  $this->set(compact('property'));
		
			}
			
			
	public function banner($id = null) {
		
		$this->loadModel('Banners');
        if ($this->request->is(['patch', 'post', 'put'])) {
			
		    $this->loadComponent('Upload');
			
		    $destinationorig  = realpath('../webroot/img/banner/orig/') . '/';
	        $destinationthumb = realpath('../webroot/img/banner/thumb/') . '/';
			$resultval="" ;
			
			
		    if(!empty($this->request->data['name'])) { 
			
			foreach($this->request->data['name'] as $key=>$value)
			{
				
				
			if($this->request->data['photonew'][$key]['size']!=0){
			if(isset($this->request->data['photo'])) { 
			@unlink($destinationorig.$this->request->data['photo'][$key]);
			@unlink($destinationthumb.$this->request->data['photo'][$key]);
			}
			
			$file = $this->request->data['photonew'][$key];
			$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,162,76); 
			$this->request->data['photo'][$key]=$resultval;}
			else
			{
				$resultval = $this->request->data['photo'][$key]; 
				}
			
				
			
				
			if(!isset($this->request->data['id'][$key])) { 
			    
			   $bannermanag = $this->Banners->newEntity();
			   $bannermanag->name = $this->request->data['name'][$key];
			   $bannermanag->property_id = $id;
			   $bannermanag->status = 'active';
			   $bannermanag->photo = $resultval;
			  // debug($bannermanag); 
			  $this->Banners->save($bannermanag);
			}
			
			if(isset($this->request->data['id']) &&  $this->request->data['name'][$key]=="") {
			$bannerid = $this->request->data['id'][$key];
			$bannerdel = $this->Banners->get($bannerid);
			@unlink($destinationorig.$this->request->data['photo'][$key]);
			@unlink($destinationthumb.$this->request->data['photo'][$key]);
			$this->Banners->delete($bannerdel);
			}
			
			if($this->request->data['id'][$key] &&  $this->request->data['name'][$key]!="") {
			   
			   $bannermanagnew = $this->Banners->get($this->request->data['id'][$key]);
			   $bannermanagnew->name = $this->request->data['name'][$key];
			   $bannermanagnew->photo = $resultval;
			   $this->Banners->save($bannermanagnew);
			   $this->Flash->success('The banner has been saved.');
			   return $this->redirect(array('action' => 'banner',$id));
			}
				
				
			}
			
			$this->Flash->success('The banner has been saved.');
			return $this->redirect(array('action' => 'banner',$id));
			}
            
		} 
		   
		  $banners = $this->Banners->find()->where(['property_id'=>$id])->toArray();
		  $this->set(compact('banners'));
		 
		
			}
			
	
	public function logo($id = null) {
		
		
		
		$property = $this->Properties->get($id, [
            'contain' => [],
			'fields'=>['property_logo', 'property_logo_alt_tag', 'property_image', 'property_image_alt_tag', 'project_of_the_month', 'project_of_the_month_banner','id']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
	    $this->loadComponent('Upload');
		
		//PROPERTY LOGO
		
		$destinationorig = realpath('../webroot/img/property/logo/') . '/';
		$destinationthumb ='';
		$resultval="" ;
		$file = $this->request->data['property_logo'];
		
		if($file['name']!=""){ 
		
		$resultval = $this->Upload->uploadimg($file,$destinationorig,$destinationthumb,142,67); 
		@unlink($destinationorig.$this->request->data['old_image_name']);
		@unlink($destinationthumb.$this->request->data['old_image_name']);
		}
		else
		{
		$resultval =$this->request->data['old_image_name'];
		}
		$this->request->data['property_logo']=$resultval;
		
		//PROPERTY IMAGE
		
		$property_imageorig = realpath('../webroot/img/property/propertyimage/') . '/';
		$property_imagethumb = realpath('../webroot/img/property/propertyimage/thumb/') . '/';
		$property_imageval="" ;
		$property_image = $this->request->data['property_image'];
		
		if($property_image['name']!=""){ 
		
		$property_imageval = $this->Upload->uploadimg($property_image,$property_imageorig,$property_imagethumb,262,190); 
		@unlink($property_imageorig.$this->request->data['old_property_image_name']);
		@unlink($property_imagethumb.$this->request->data['old_property_image_name']);
		}
		else
		{
		$property_imageval = $this->request->data['old_property_image_name'];
		}
		$this->request->data['property_image']=$property_imageval;
		
		
		//PROJECT OF THE MONTH
		
		$projectofthemonthorig = realpath('../webroot/img/property/project-of-the-month/') . '/';
		$projectofthemonththumb ='';
		$resultval="" ;
		
		
		if($this->request->data['project_of_the_month']=='Y') {
		$projectofthemonthbanner = $this->request->data['project_of_the_month_banner'];
		if($projectofthemonthbanner['name']!=""){ 
		
		$projectofthemonth = $this->Upload->uploadimg($projectofthemonthbanner,$projectofthemonthorig,$projectofthemonththumb,553,345); 
		@unlink($projectofthemonthorig.$this->request->data['old_project_of_the_month_banner']);
		//@unlink($destinationthumb.$this->request->data['old_project_of_the_month_banner']);
		}
		else
		{
		$projectofthemonth =$this->request->data['old_project_of_the_month_banner'];
		}
		$this->request->data['project_of_the_month_banner']=$projectofthemonth;
		}
		else
		{  $projectofthemonthorig = realpath('../webroot/img/property/project-of-the-month/') . '/';
		   @unlink($projectofthemonthorig.$this->request->data['old_project_of_the_month_banner']);
			
			}
		
		
		
		$property = $this->Properties->patchEntity($property, $this->request->data);
		//debug($property); exit;
            if ($this->Properties->save($property)) {
				$this->Flash->success('The logo has been saved');
				$this->redirect(array('action' => 'logo',$id));
			} else {
				$this->Flash->error('The logo could not be saved. Please, try again.');
			}
		} 
		
		
		  $this->set(compact('property'));
		
			
		
		}
			
			
	public function overview($id = null) {
		$property = $this->Properties->get($id, [
            'contain' => [],
			'fields'=>['overview_heading', 'overview', 'pricelist_heading', 'price_list_desc', 'specification_heading', 'specification', 'location_detail', 'gallery_heading', 'youtube_url','id']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
		$property = $this->Properties->patchEntity($property, $this->request->data);
		//print_r($property); 
            if ($this->Properties->save($property)) {
				$this->Flash->success('The data has been saved');
				$this->redirect(array('action' => 'overview',$id));
			} else {
				$this->Flash->error('The data could not be saved. Please, try again.');
			}
		} 
		
		
		  $this->set(compact('property'));
		
			}	
			
			
	public function plan($id = null) {
		
		
		
		$property = $this->Properties->get($id, [
            'contain' => [],
			'fields'=>['location_heading', 'location_image', 'location_alt_tag', 'master_heading', 'master_image', 'master_alt_tag', 'site_heading', 'site_image', 'site_alt_tag', 'numbering_heading', 'numbering_image', 'numbering_alt_tag', 'layout_heading', 'layout_image', 'layout_image_alt', 'keyplan_heading', 'keyplan_image', 'keyplan_alt_tag','id']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
			
	    $this->loadComponent('Upload');
		
		$location_imageorig = realpath('../webroot/img/property/location_map/') . '/';
		$location_imagethumb = '';
		$location_imageval="" ;
		$location_image = $this->request->data['location_image'];
		
		if($location_image['name']!=""){ 
		
		$location_imageval = $this->Upload->uploadimg($location_image,$location_imageorig,$location_imagethumb,630,373); 
		@unlink($location_imageorig.$this->request->data['old_location_image_name']);
		//@unlink($location_imagethumb.$this->request->data['old_location_image_name']);
		}
		else
		{
		$location_imageval = $this->request->data['old_location_image_name'];
		}
		$this->request->data['location_image']=$location_imageval;



        $master_imageorig = realpath('../webroot/img/property/master_plan/') . '/';
		$master_imagethumb = '';
		$master_imageval="" ;
		$master_image = $this->request->data['master_image'];
		
		if($master_image['name']!=""){ 
		
		$master_imageval = $this->Upload->uploadimg($master_image,$master_imageorig,$master_imagethumb,630,373); 
		@unlink($master_imageorig.$this->request->data['old_master_image_name']);
		//@unlink($master_imagethumb.$this->request->data['old_master_image_name']);
		}
		else
		{
		$master_imageval = $this->request->data['old_master_image_name'];
		}
		$this->request->data['master_image']=$master_imageval;



        $site_imageorig = realpath('../webroot/img/property/site_plan/') . '/';
		$site_imagethumb = '';
		$site_imageval="" ;
		$site_image = $this->request->data['site_image'];
		
		if($site_image['name']!=""){ 
		
		$site_imageval = $this->Upload->uploadimg($site_image,$site_imageorig,$site_imagethumb,630,373); 
		@unlink($site_imageorig.$this->request->data['old_site_image_name']);
		//@unlink($site_imagethumb.$this->request->data['old_site_image_name']);
		}
		else
		{
		$site_imageval = $this->request->data['old_site_image_name'];
		}
		$this->request->data['site_image']=$site_imageval;



        $numbering_imageorig = realpath('../webroot/img/property/numbering_plan/') . '/';
		$numbering_imagethumb = '';
		$numbering_imageval="" ;
		$numbering_image = $this->request->data['numbering_image'];
		
		if($numbering_image['name']!=""){ 

		
		$numbering_imageval = $this->Upload->uploadimg($numbering_image,$numbering_imageorig,$numbering_imagethumb,630,373); 
		@unlink($numbering_imageorig.$this->request->data['old_numbering_image_name']);
		//@unlink($numbering_imagethumb.$this->request->data['old_numbering_image_name']);
		}
		else
		{
		$numbering_imageval = $this->request->data['old_numbering_image_name'];
		}
		$this->request->data['numbering_image']=$numbering_imageval;



        $layout_imageorig = realpath('../webroot/img/property/layout_plan/') . '/';
		$layout_imagethumb = '';
		$layout_imageval="" ;
		$layout_image = $this->request->data['layout_image'];
		
		if($layout_image['name']!=""){ 
		
		$layout_imageval = $this->Upload->uploadimg($layout_image,$layout_imageorig,$layout_imagethumb,630,373); 
		@unlink($layout_imageorig.$this->request->data['old_layout_image_name']);
		//@unlink($layout_imagethumb.$this->request->data['old_layout_image_name']);
		}
		else
		{
		$layout_imageval = $this->request->data['old_layout_image_name'];
		}
		$this->request->data['layout_image']=$layout_imageval;
		
		
		
		$keyplan_imageorig = realpath('../webroot/img/property/keyplan_plan/') . '/';
		$keyplan_imagethumb = '';
		$keyplan_imageval="" ;
		$keyplan_image = $this->request->data['keyplan_image'];
		
		if($keyplan_image['name']!=""){ 
		
		$keyplan_imageval = $this->Upload->uploadimg($keyplan_image,$keyplan_imageorig,$keyplan_imagethumb,630,373); 
		@unlink($keyplan_imageorig.$this->request->data['old_keyplan_image_name']);
		//@unlink($keyplan_imagethumb.$this->request->data['old_keyplan_image_name']);
		}
		else
		{
		$keyplan_imageval = $this->request->data['old_keyplan_image_name'];
		}
		$this->request->data['keyplan_image']=$keyplan_imageval;
		
		
		$this->request->data['update_date']=date('Y-m-d h:i:s');
		
		$property = $this->Properties->patchEntity($property, $this->request->data);
		//print_r($property); exit;
            if ($this->Properties->save($property)) {
				$this->Flash->success('The plan has been saved');
				$this->redirect(array('action' => 'plan',$id));
			} else {
				$this->Flash->error('The plan could not be saved. Please, try again.');
			}
		} 
		
		
		  $this->set(compact('property'));
		
			
		
		}	
		
		
	public function pdf($id = null) {
		
		
		
		$property = $this->Properties->get($id, [
            'contain' => [],
			'fields'=>['ebrochure_heading', 'ebrochure_pdf', 'application_heading', 'application_pdf','id']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {	
			
	    $this->loadComponent('Upload');
		
		//PROPERTY LOGO
		
		$ebrochurepdf_path = realpath('../webroot/img/property/documents/') . '/';
		$ebrochurepdf_val=array() ;
		
		
		if(trim($this->request->data['removethis'],',')!='') { 
		
		    $rmv=@explode(",",$this->request->data['removethis']);
			
			foreach($rmv as $rrmv)
			{  if($rrmv!='') {
				//echo $ebrochurepdf_path.$rrmv;
				@unlink($ebrochurepdf_path.$rrmv);
				}
			}
				
			}
		
		
		$ebrochure = $this->request->data['e-brochure'];
		$eapartments = $this->request->data['e-brochure-apartments'];
		$efloors = $this->request->data['e-brochure-floors'];
		$eplots = $this->request->data['e-brochure-plots'];
		$evillas = $this->request->data['e-brochure-villas'];
		
		if($ebrochure['name']!=""){ 
		$ebrochure_val = $this->Upload->uploadPdf($ebrochure,$ebrochurepdf_path); 
		@unlink($ebrochurepdf_path.$this->request->data['old-ebrochure']);}	else{ $ebrochure_val = $this->request->data['old-ebrochure']; }
		
		if($eapartments['name']!=""){ 
		$eapartments_val = $this->Upload->uploadPdf($eapartments,$ebrochurepdf_path); 
		@unlink($ebrochurepdf_path.$this->request->data['old-ebrochure-apartments']);}	else{ $eapartments_val = $this->request->data['old-ebrochure-apartments']; }
		
		if($efloors['name']!=""){ 
		$efloors_val = $this->Upload->uploadPdf($efloors,$ebrochurepdf_path); 
		@unlink($ebrochurepdf_path.$this->request->data['old-ebrochure-floors']);}	else{ $efloors_val = $this->request->data['old-ebrochure-floors']; }
		
		if($eplots['name']!=""){ 
		$eplots_val = $this->Upload->uploadPdf($eplots,$ebrochurepdf_path); 
		@unlink($ebrochurepdf_path.$this->request->data['old-ebrochure-plots']);}	else{ $eplots_val = $this->request->data['old-ebrochure-plots']; }
		
		if($evillas['name']!=""){ 
		$evillas_val = $this->Upload->uploadPdf($evillas,$ebrochurepdf_path); 
		@unlink($ebrochurepdf_path.$this->request->data['old-ebrochure-villas']);}	else{ $evillas_val = $this->request->data['old-ebrochure-villas']; }
		
		
		if($ebrochure_val!=''){ $ebrochurepdf_val['e-brochure']=$ebrochure_val;}
		if($eapartments_val!=''){$ebrochurepdf_val['e-brochure-apartments']=$eapartments_val;}
		if($efloors_val!=''){$ebrochurepdf_val['e-brochure-floors']=$efloors_val;}
		if($eplots_val!=''){$ebrochurepdf_val['e-brochure-plots']=$eplots_val;}
		if($evillas_val!=''){$ebrochurepdf_val['e-brochure-villas']=$evillas_val;}
		
		
		if(!empty($ebrochurepdf_val)){$this->request->data['ebrochure_pdf'] = serialize($ebrochurepdf_val);}
		
		
		///APPLICATION IMAGE
		

        ///APPLICATION PDF 
        $applicationpdf_path = realpath('../webroot/img/property/documents/') . '/';
		$applicationpdf_val=array() ;
		
		$application = $this->request->data['application-form'];
		$aapartments = $this->request->data['application-form-apartments'];
		$afloors = $this->request->data['application-form-floors'];
		$aplots = $this->request->data['application-form-plots'];
		$avillas = $this->request->data['application-form-villas'];
		
		if($application['name']!=""){ 
		$application_val = $this->Upload->uploadPdf($application,$applicationpdf_path); 
		@unlink($applicationpdf_path.$this->request->data['old-application']);}	else{ $application_val = $this->request->data['old-application']; }
		
		if($aapartments['name']!=""){ 
		$aapartments_val = $this->Upload->uploadPdf($aapartments,$applicationpdf_path); 
		@unlink($applicationpdf_path.$this->request->data['old-application-apartments']);}	else{ $aapartments_val = $this->request->data['old-application-apartments']; }
		
		if($afloors['name']!=""){ 
		$afloors_val = $this->Upload->uploadPdf($afloors,$applicationpdf_path); 
		@unlink($applicationpdf_path.$this->request->data['old-application-floors']);}	else{ $afloors_val = $this->request->data['old-application-floors']; }
		
		if($aplots['name']!=""){ 
		$aplots_val = $this->Upload->uploadPdf($aplots,$applicationpdf_path); 
		@unlink($applicationpdf_path.$this->request->data['old-application-plots']);}	else{ $aplots_val = $this->request->data['old-application-plots']; }
		
		if($avillas['name']!=""){ 
		$avillas_val = $this->Upload->uploadPdf($avillas,$applicationpdf_path); 
		@unlink($applicationpdf_path.$this->request->data['old-application-villas']);}	else{ $avillas_val = $this->request->data['old-application-villas']; }
		
		
		if($application_val!=''){$applicationpdf_val['application-form']=$application_val;}
		if($aapartments_val!=''){$applicationpdf_val['application-form-apartments']=$aapartments_val;}
		if($afloors_val!=''){$applicationpdf_val['application-form-floors']=$afloors_val;}
		if($aplots_val!=''){$applicationpdf_val['application-form-plots']=$aplots_val;}
		if($avillas_val!=''){$applicationpdf_val['application-form-villas']=$avillas_val;}
		
		
		if(!empty($applicationpdf_val)){$this->request->data['application_pdf'] = serialize($applicationpdf_val);}
		
		
		
        $this->request->data['update_date']=date('Y-m-d h:i:s');
		
		$property = $this->Properties->patchEntity($property, $this->request->data);
		
		//debug($property); exit;
            if ($this->Properties->save($property)) {
				$this->Flash->success('The document has been saved');
				$this->redirect(array('action' => 'pdf',$id));
			} else {
				$this->Flash->error('The document could not be saved. Please, try again.');
			}
		} 
		
		
		  $this->set(compact('property'));
		
			
		
		}
		
	
	public function price($id = null) {
		
		$this->loadModel('PriceManagement');
		$this->loadModel('Units');
        if ($this->request->is(['patch', 'post', 'put'])) {
			
		    //print_r($this->request->data);  exit;
			if(!empty($this->request->data['unit_id'])) { 
			foreach($this->request->data['unit_id'] as $key=>$value)
			{ 
			if(empty($this->request->data['id'][$key])) {   
			  $pricemanag = $this->PriceManagement->newEntity();

			   $pricemanag->unit_id = $this->request->data['unit_id'][$key];
			   $pricemanag->price = $this->request->data['price'][$key];
			   $pricemanag->size = $this->request->data['size'][$key];
		       $pricemanag->property_id = $this->request->data['property_id'];
			  
			   
			   // print_r($priceManagement); 
		       //$priceManagement = $this->PriceManagement->patchEntity($priceManagement, $this->request->data);
		       $this->PriceManagement->save($pricemanag);
			
			}
			
			if(!empty($this->request->data['id'][$key]) &&  $this->request->data['price'][$key]==0) {
			$priceid = $this->request->data['id'][$key];
			$priceManagementdel = $this->PriceManagement->get($priceid);
			$this->PriceManagement->delete($priceManagementdel);
			}
			if(!empty($this->request->data['id'][$key]) &&  $this->request->data['price'][$key]!=0) {
			   
			   $priceManagementnew = $this->PriceManagement->get($this->request->data['id'][$key]);
			   $priceManagementnew->unit_id = $this->request->data['unit_id'][$key];
			   $priceManagementnew->price = $this->request->data['price'][$key];
			   $priceManagementnew->size = $this->request->data['size'][$key];
			 
			   $this->PriceManagement->save($priceManagementnew);
			}
			}
			
           $this->Flash->success('The Price has been saved.');
		   return $this->redirect(array('action' => 'price',$id)); 
		} 
		
		}
		  //$unit=array();
		  $priceManagement = $this->PriceManagement->find()->where(['property_id'=>$id]);
		  $unit = $this->Units->find()->select(['id','name']);
		  $this->set(compact('priceManagement','unit'));
		  
		//debug($priceManagement);
			}	
			
			
	public function amenities($id = null) {
        $property = $this->Properties->get($id, [
            'contain' => [],
			'fields'=>['amenities','id']
        ]);
		
        if ($this->request->is(['patch', 'post', 'put'])) {
		    
			if(!empty($this->request->data['amenities']))
			{ 
			$amenities=serialize($this->request->data['amenities']); $this->request->data['amenities']=$amenities;
			}
		
		    else 
			{
				$this->request->data['amenities']='';
				
				}
            $property = $this->Properties->patchEntity($property, $this->request->data);
			
            if ($this->Properties->save($property)) {
                $this->Flash->success('The property has been saved.');
                return $this->redirect(['action' => 'amenities',$id]);
            } else {
                $this->Flash->error('The property could not be saved. Please, try again.');
            }
        }
        $this->set(compact('property'));
        $this->set('_serialize', ['property']);
    }
	
		
	public function connectivity($id = null)  {
		
		$this->loadModel('Connectivity');
        if ($this->request->is(['patch', 'post', 'put'])) {
		    
			if(!empty($this->request->data['amenity_id']) and !empty($this->request->data['name']))
			{ 
			
			foreach($this->request->data['amenity_id'] as $key=>$value)
			{ 
			if(empty($this->request->data['id'][$key]) and $this->request->data['name'][$key]!='') {  
	 
			   $connectivity = $this->Connectivity->newEntity();
			   $connectivity->amenity_id = $this->request->data['amenity_id'][$key];
			   $connectivity->name = $this->request->data['name'][$key];
		       $connectivity->property_id = $this->request->data['property_id'];
		       $this->Connectivity->save($connectivity);
			   
			}
			
			if(!empty($this->request->data['id'][$key]) &&  $this->request->data['name'][$key]=='') {
			$dataid = $this->request->data['id'][$key];
			$connectivitydel = $this->Connectivity->get($dataid);
			$this->Connectivity->delete($connectivitydel);
			}
			if(!empty($this->request->data['id'][$key]) &&  $this->request->data['name'][$key]!='') {
			   
			   $connectivitynew = $this->Connectivity->get($this->request->data['id'][$key]);
			   $connectivitynew->amenity_id = $this->request->data['amenity_id'][$key];
			   $connectivitynew->name = $this->request->data['name'][$key];
		       $connectivitynew->property_id = $this->request->data['property_id'];
			   $this->Connectivity->save($connectivitynew);
			}
			   
		}	
			$this->Flash->success('The Connectivity has been saved.');
		    return $this->redirect(array('action' => 'connectivity',$id)); 
			
			}
        }
        
        $connectivity = $this->Connectivity->find()->where(['property_id'=>$id]);
        $this->set(compact('connectivity'));
    }
	
			

    /**
     * Delete method
     *
     * @param string|null $id Property id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
	 
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $property = $this->Properties->get($id);
        if ($this->Properties->delete($property)) {
            $this->Flash->success('The property has been deleted.');
        } else {
            $this->Flash->error('The property could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
	
	public function proplist($bid=null) {
	    $this->layout='ajax';
		$this->autoRender = false;
        $data='<option value="">Select Property</option>';
		$gallery=$this->Properties->find()->select(['name','id'])->where(['builder_id'=>$bid,'status'=>'active']);
		foreach($gallery as $key=>$value){ $data.='<option value="'.$value['id'].'">'.$value['name'].'</option>';}
		echo $data;
	}
	
	public function search($search=null) {
   
	$this->layout='ajax';
	if($search=="gallery") {
	$property=$this->Properties->find()->select(['name','id','posted_date','status'])->where(['Properties.gallery_heading !='=>'']);
	}
	else
	{
	$property=$this->Properties->find()->select(['Properties.name','Properties.id','Properties.posted_date','Properties.status'])->where(['Properties.name like '=>'%'.$search.'%']);
	}
	//debug($prop); exit;
	 $this->set(compact('property'));
	}
	
	 public function ptypewise($pass = null,$pass2 = null) {
		 
	$connection = ConnectionManager::get('default');
	$type=$pass;
	$loc=$pass2;
	
	if(isset($type))
	{
	$this->set("filter","ptypewise");
	$this->set("type",$type);
    $this->set("loc",$loc);
	
	$result=$connection->execute("select id,name,status,ptypewise as orderby from properties where property_type_id='$type' and location_id='$loc' and status='active' order by ptypewise ")->fetchAll('assoc');
	$this->set('properties',$result);
	
	$locationlist=$connection->execute("select l.name,l.id from locations as l join properties as p on p.location_id=l.id where p.property_type_id=$type GROUP BY p.location_id")->fetchAll('assoc');
	$this->set("locations",$locationlist);
	
	}
	else
	{
	$this->set('type','');
	$this->set("filter",'');
	$this->set("loc",'');
	}
	}
	
	public function resetallptypewisepriority() {
	if ($this->request->is('ajax') and isset($this->request->params['pass'][0])) {
	$connection = ConnectionManager::get('default');
	
	$this->layout='ajax';
    $this->autoRender = false;
	
	$orderby='ptypewise';
	$type=$this->request->params['pass'][0];
	$loc=$this->request->params['pass'][1];
	$result=$connection->execute("select id from properties where property_type_id='$type' and location_id='$loc' and status='active' order by $orderby")->fetchAll('assoc');
	$i=1;
	foreach ($result as $property)
	{
	$connection->query("update properties set ".$orderby." =".$i." where id=".$property['id']);
	$i++;
	    }
	  }
     }
	 
	public function swapptypewisepriority() {
	
	if ($this->request->is('ajax') and isset($this->request->params['pass'][0])) {
		$connection = ConnectionManager::get('default');
	$this->layout='ajax';
    $this->autoRender = false;
	
	$orderby=$this->request->params['pass'][0];
	$type=$this->request->params['pass'][1];
	$loc=$this->request->params['pass'][2];
	$newpr=$this->request->params['pass'][3];
	$oldpr=$this->request->params['pass'][4];
	
	$old=$oldpr;
	$newagain=$newpr;
	$oldagain=$oldpr;
	
	if ($newpr > $oldpr)
	{
	$firstquery=$connection->query("update properties set $orderby = '2147483647' where $orderby = '".$oldagain."' and property_type_id='$type' and location_id='$loc' and status='active'");
	for ($pq=$oldagain+1;$pq<=$newagain;$pq++)
	{
	$try=$connection->query("update properties set $orderby = '".$old."' where $orderby = '".$pq."' and  property_type_id='$type' and location_id='$loc' and status='active'");
	$old++;
	}
	$secondquery=$connection->query("update properties set $orderby = '".$newagain."' where $orderby = '2147483647' and  property_type_id='$type' and location_id='$loc' and status='active'");
	}
	if ($oldpr > $newpr)
	{
	$firstquery=$connection->query("update properties set $orderby = '2147483647' where $orderby = '".$oldagain."' and  property_type_id='$type' and location_id='$loc' and status='active'");
	for ($pq=$oldagain-1;$pq>=$newagain;$pq--)
	{
	$try=$connection->query("update properties set $orderby = '".$old."' where $orderby = '".$pq."' and  property_type_id='$type' and location_id='$loc' and status='active'");
	$old--;
	}
	$secondquery=$connection->query("update properties set $orderby = '".$newagain."' where $orderby = '2147483647' and  property_type_id='$type' and location_id='$loc' and status='active'");
	}
	}
	}
	
	public function builderwise($pass = null) {
		$this->loadModel('Builders');
	$connection = ConnectionManager::get('default');
	if(isset($pass))
	{
    $pass=$this->request->params['pass'][0];
	
	$this->set("filter","builderwise_priority");
	$this->set("orderby",$pass);
    $this->set("pass",$pass);
	$result=$connection->query("select id,name,status,builderwise_priority as orderby from properties where builder_id='$pass' and status='active' order by builderwise_priority ");
	$this->set('properties',$result);
	$this->set("builders",$this->Builders->find('list'));
	}
	else
	{
	$this->set('pass','');
	$this->set("filter",'');
	$this->set("orderby",'');
	$this->set("builders",$this->Builders->find('list'));
	}
	}
	
	public function resetallbuilderpriority() {
	if ($this->request->is('ajax') and isset($this->request->params['pass'][0])) {
	$connection = ConnectionManager::get('default');
	
	$this->layout='ajax';
    $this->autoRender = false;
	
	$orderby='builderwise_priority';
	$filter=$this->request->params['pass'][0];
	$result=$connection->query("select id from properties where builder_id='$filter' and status='active' order by $orderby");
	$i=1;
	foreach ($result as $property)
	{	
	$connection->query("update properties set ".$orderby." =".$i." where id=".$property['id']);
	$i++;
	    }
	  }
     }
	 
    public function swapbuilderpriority() {
	
	if ($this->request->is('ajax') and isset($this->request->params['pass'][0])) {
		
	$connection = ConnectionManager::get('default');
	
	$this->layout='ajax';
    $this->autoRender = false;
	
	$orderby=$this->request->params['pass'][0];
	$filter=$this->request->params['pass'][1];
	$newpr=$this->request->params['pass'][2];
	$oldpr=$this->request->params['pass'][3];
	
	$old=$oldpr;
	$newagain=$newpr;
	$oldagain=$oldpr;
	
	if ($newpr > $oldpr)
	{
	$firstquery=$connection->query("update properties set $orderby = '2147483647' where $orderby = '".$oldagain."' and builder_id='$filter' and status='active'");
	for ($pq=$oldagain+1;$pq<=$newagain;$pq++)
	{
	$try=$connection->query("update properties set $orderby = '".$old."' where $orderby = '".$pq."' and builder_id='$filter' and status='active'");
	$old++;
	}
	$secondquery=$connection->query("update properties set $orderby = '".$newagain."' where $orderby = '2147483647' and builder_id='$filter' and status='active'");
	}
	if ($oldpr > $newpr)
	{
	$firstquery=$connection->query("update properties set $orderby = '2147483647' where $orderby = '".$oldagain."' and builder_id='$filter' and status='active'");
	for ($pq=$oldagain-1;$pq>=$newagain;$pq--)
	{
	$try=$connection->query("update properties set $orderby = '".$old."' where $orderby = '".$pq."' and builder_id='$filter' and status='active'");
	$old--;
	}
	$secondquery=$connection->query("update properties set $orderby = '".$newagain."' where $orderby = '2147483647' and builder_id='$filter' and status='active'");
	}
	}
	}
	
	public function priority($pass = null,$pass2 = null) {
	if(isset($pass) and isset($pass2))
	{
	$connection = ConnectionManager::get('default');
    $field1=$pass;
	$field2=$pass2;
	$this->set("filter",$pass);
	$this->set("orderby",$pass2);
    $this->set("pass","$pass##$pass2");
	$result=$connection->query("select id,name,status,$field1 as orderby,$field2 as filter from properties where $field2='Y' and status='active' order by $field1 ");
	$this->set('result',$result);
	}
	else
	{ 
	$this->set('pass','');
	$this->set("filter",'');
	$this->set("orderby",'');
	$this->set('result','');
	}
	}
	
	public function ajaxresetallpriority($pass = null,$pass2 = null) {
	if ($this->request->is('ajax') and isset($pass)) {
	$connection = ConnectionManager::get('default');
	$this->layout='ajax';
    $this->autoRender = false;
	$orderby=$pass2;
	$filter=$pass;
	$result=$connection->query("select id from properties where $filter='Y' and status='active' order by $orderby");
	$i=1;
	foreach ($result as $property)
	{	
	$connection->query("update properties set ".$orderby." =".$i." where id=".$property['id']);
	$i++;
	}
	}
	}
	
	public function ajaxswappriority() {
	
	if ($this->request->is('ajax') and isset($this->request->params['pass'][0])) {
		
	$connection = ConnectionManager::get('default');
	$this->layout='ajax';
    $this->autoRender = false;
	
	 $filter=$this->request->params['pass'][0];
	 $orderby=$this->request->params['pass'][1];
	 $newpr=$this->request->params['pass'][2];
	 $oldpr=$this->request->params['pass'][3];
	
	$old=$oldpr;
	$newagain=$newpr;
	$oldagain=$oldpr;
	
	if ($newpr > $oldpr)
	{
	$firstquery=$connection->query("update properties set $orderby = '2147483647' where $orderby = '".$oldagain."' and $filter='Y' and status='active'");
	for ($pq=$oldagain+1;$pq<=$newagain;$pq++)
	{
	$try=$connection->query("update properties set $orderby = '".$old."' where $orderby = '".$pq."' and $filter='Y' and status='active'");
	$old++;
	}
	$secondquery=$connection->query("update properties set $orderby = '".$newagain."' where $orderby = '2147483647' and $filter='Y' and status='active'");
	}
	if ($oldpr > $newpr)
	{
	$firstquery=$connection->query("update properties set $orderby = '2147483647' where $orderby = '".$oldagain."' and $filter='Y' and status='active'");
	for ($pq=$oldagain-1;$pq>=$newagain;$pq--)
	{
	$try=$connection->query("update properties set $orderby = '".$old."' where $orderby = '".$pq."' and $filter='Y' and status='active'");
	$old--;
	}
	$secondquery=$connection->query("update properties set $orderby = '".$newagain."' where $orderby = '2147483647' and $filter='Y' and status='active'");
	}
	}
	}
	
	function createXml(){
	//$this->layout ='ajax';	
	//$this->autoRender = false;
	$connection = ConnectionManager::get('default'); 
	
    $xml='<?xml version="1.0" encoding="UTF-8"?>';
	$xml.='<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
    
	$xml.='<url><loc>'.SITE_PATH.'</loc>';
	$xml.='<changefreq>daily</changefreq>';
	$xml.='</url>';
	
	
	$xml.='<url><loc>'.SITE_PATH.'builder/'.'</loc>';
	$xml.='<changefreq>daily</changefreq>';
	$xml.='</url>';
	
	$xml.='<url><loc>'.SITE_PATH.'about-us/'.'</loc>';
	$xml.='<changefreq>daily</changefreq>';
	$xml.='</url>';
	
	$xml.='<url><loc>'.SITE_PATH.'sitemaps/'.'</loc>';
	$xml.='<changefreq>daily</changefreq>';
	$xml.='</url>';
    
	$xml.='<url><loc>'.SITE_PATH.'contact-us/'.'</loc>';
	$xml.='<changefreq>daily</changefreq>';
	$xml.='</url>';
	
	$xml.='<url><loc>'.SITE_PATH.'disclaimer/'.'</loc>';
	$xml.='<changefreq>daily</changefreq>';
	$xml.='</url>';
  
	$xml.='<url><loc>'.SITE_PATH.'nri-real-estate-investment/'.'</loc>';
	$xml.='<changefreq>daily</changefreq>';
	$xml.='</url>';
	
	
	$datapr = $connection->execute("select url from properties as pr where status='active'")->fetchAll('assoc');
	foreach($datapr as $key=>$prval)  {
	
	$xml.='<url><loc>'.trim(SITE_PATH.'project/'.$prval['url'].'/').'</loc>';
	$xml.='<changefreq>daily</changefreq>';
	$xml.='</url>';
	
	}
	
	$datalocation = $connection->execute("select url from propertype_locations as loc where status='active'")->fetchAll('assoc');
	foreach($datalocation as $key=>$locval)  {
		
	$xml.='<url><loc>'.trim(SITE_PATH.'property/'.$locval['url'].'/').'</loc>';
	$xml.='<changefreq>daily</changefreq>';
	$xml.='</url>';
	
	}
	
	$databuild = $connection->execute("select url from builders as build where status='active'")->fetchAll('assoc');
	foreach($databuild as $key=>$buildval)  {
		
	$xml.='<url><loc>'.trim(SITE_PATH.'builder/'.$buildval['url'].'/').'</loc>';
	$xml.='<changefreq>daily</changefreq>';
	$xml.='</url>';
	
	}
	
	$sectors = $connection->execute("SELECT s.url as securl,l.url as locurl  FROM sectors as s join locations as l on s.location_id=l.id   WHERE  s.status!='deactive'")->fetchAll('assoc');
	foreach($sectors as $key=>$secval)  {
		
	$xml.='<url><loc>'.SITE_PATH.'location/'.trim($secval['locurl']).'/'.trim($secval['securl'].'/').'</loc>';
	$xml.='<changefreq>daily</changefreq>';
	$xml.='</url>';
	
	}
	
	$sublocations = $connection->execute("SELECT subloc.url as sublocurl,l.url as locurl FROM propertype_sublocations as subloc join locations as l on subloc.location_id=l.id   WHERE  subloc.status!='deactive'")->fetchAll('assoc');
	foreach($sublocations as $key=>$sublocdval)  {
		
	$xml.='<url><loc>'.SITE_PATH.'sublocation/'.trim($sublocdval['locurl']).'/'.trim($sublocdval['sublocurl'].'/').'</loc>';
	$xml.='<changefreq>daily</changefreq>';
	$xml.='</url>';
	
	}
    $xml.='</urlset>';
	
	//$data=$domtree->saveXML();
	
	$destinationorig  = realpath('../webroot/') . '/';
	$ourFileName = $destinationorig.'sitemap.xml' ;
	$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
	fwrite($ourFileHandle,$xml);
	fclose($ourFileHandle);
	}
	
	function checkConnection()
	{
	//
	//	$connected = @fsockopen("www.hcorealestates.com", 80); 
	//	if ($connected){
	//	$is_conn = true; 
	//	fclose($connected);
	//	}
	//	else{
	//	$is_conn = false;
	//	}
	//	return $is_conn;
	//	
    }
}
