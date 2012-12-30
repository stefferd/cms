<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 28-12-12
 * Time: 00:18
 */

require(classes . 'catalog/catitem.php');
require(classes . 'catalog/car.php');
require(classes . 'catalog/daocatalog.php');

class CatalogController {
    private $catalog = null;
    private $daocatalog = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new CatalogSmarty();
        $this->catalog = new CatItem();
        $this->daocatalog = new DaoCatalog();
    }

    public function save($post = array()) {
        /*
            Save the catalog item, the variables are as follow:

            $post:      The values of the completed form
        */
        if (isset($post['brand']))
        {
            //Car item
            $this->catalog = new Car();
            $this->catalog->setBrand($post['brand']);
            $this->catalog->setType($post['type']);
            $this->catalog->setYear($post['year']);
            $this->catalog->setState($post['state']);
            $this->catalog->setEngine($post['engine']);
            $this->catalog->setMilage($post['milage']);
            $this->catalog->setTransmission($post['transmission']);
            $this->catalog->setTransportCostPerKm($post['transportCostPerKm']);
            $this->catalog->setPrice($post['price']);
        }
        $this->catalog->setTitle($post['title']);
        $this->catalog->setText($post['text']);
        $active = ($post['active'] == 'on') ? 1 : 0;
        $this->catalog->setActive($active);
        $this->catalog->setUser($_SESSION['id']);

        return $this->daocatalog->save($this->catalog);
    }

    public function update($post = array(), $files = array(), $id) {
        /*
            Save the catalog item, the variables are as follow:

            $post:      The values of the completed form
        */
        if (isset($post['brand']))
        {
            //Car item
            $this->catalog = new Car();
            $this->catalog->setBrand($post['brand']);
            $this->catalog->setType($post['type']);
            $this->catalog->setYear($post['year']);
            $this->catalog->setState($post['state']);
            $this->catalog->setEngine($post['engine']);
            $this->catalog->setMilage($post['milage']);
            $this->catalog->setTransmission($post['transmission']);
            $this->catalog->setTransportCostPerKm($post['transportCostPerKm']);
            $this->catalog->setPrice($post['price']);
            $this->catalog->setIdentifier($id);
        }
        $this->catalog->setTitle($post['title']);
        $this->catalog->setText($post['text']);
        $active = ($post['active'] == 'on') ? 1 : 0;
        $this->catalog->setActive($active);
        $this->catalog->setUser($_SESSION['id']);
        $this->catalog->setId($id);

        $this->pictures($files, $id);

        return $this->daocatalog->update($this->catalog);
    }

    public function create($post = array(), $type) {
        /*
            Show the creation form, the variable are as follow:

            $post:  The post values of the not completed form
            $type:  The type of catalog item to create
        */
        $template = '';
        switch($type) {
            case 'car':
               $this->catalog = new Car();
               $template = 'form-car.tpl';
               break;
            default:
               $this->catalog = new CatItem();
               $template = 'form.tpl';
               break;
        }

        $this->tpl->assignByRef('catalogitem', $this->catalog);
        $this->tpl->assignByRef('post', $post);
        $this->tpl->display($template);
    }

    public function edit($post = array(), $id, $type) {
        /*
            Show the creation form, the variable are as follow:

            $post:  The post values of the not completed form
            $type:  The type of catalog item to create
        */
        $template = '';
        switch($type) {
            case 'car':
                $this->catalog = new Car();
                $template = 'form-car.tpl';
                break;
            default:
                $this->catalog = new CatItem();
                $template = 'form.tpl';
                break;
        }

        $this->daocatalog->get($this->catalog, $id);
        $this->tpl->assignByRef('catalogitem', $this->catalog);
        $this->tpl->assignByRef('pictures', $this->getPictures($id));
        $this->tpl->assignByRef('post', $post);
        $this->tpl->display($template);
    }

    public function view($data) {
        $this->tpl->assign('data', $data);
        $this->tpl->display('overview.tpl');
    }

    public function remove($id) {
        return $this->daocatalog->delete($id);
    }

    public function getEntries() {
        return $this->daocatalog->getEntries();
    }

    private function pictures($files = array(), $id) {
        $pictures = array();
        if (isset($files['pictures'])){
            $errors= array();
            foreach($files['pictures']['tmp_name'] as $key => $tmp_name ){
                $file_name = $key.$files['pictures']['name'][$key];
                $file_size =$files['pictures']['size'][$key];
                $file_tmp =$files['pictures']['tmp_name'][$key];
                $file_type=$files['pictures']['type'][$key];
                if($file_size > 2097152){
                    $errors[]='File size must be less than 2 MB';
                }
                $desired_dir= theme . "images/catalog/" . $id . "/";
                $filename =$desired_dir.$file_name;
                if(empty($errors)==true){
                    if(is_dir($desired_dir)==false){
                        mkdir("$desired_dir", 0700);		// Create directory if it does not exist
                    }
                    if(is_dir("$desired_dir/".$file_name)==false){
                        move_uploaded_file($file_tmp,$desired_dir.$file_name);
                    }else{									//rename the file if another one exist
                        $new_dir=$desired_dir.$file_name.time();
                        rename($file_tmp,$new_dir) ;
                    }
                    array_push($pictures, $filename);
                }else{
                    print_r($errors);
                }
            }
            if(empty($error)){
                return true;
            }
        }
    }

    private function getPictures($id) {

        // create an array to hold directory list
        $results = array();
        $directory = theme . "images/catalog/" . $id . "/";
        // create a handler for the directory
        $handler = opendir($directory);

        // open directory and walk through the filenames
        while ($file = readdir($handler)) {
            // if file isn't this directory or its parent, add it to the results
            if ($file != "." && $file != "..") {
                $results[] = url . $directory . $file;
            }

        }
        // tidy up: close the handler
        closedir($handler);
        // done!
        return $results;
    }
}