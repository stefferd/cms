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
            $this->catalog->brand = $post['brand'];
            $this->catalog->type = $post['type'];
            $this->catalog->year = $post['year'];
            $this->catalog->state = $post['state'];
            $this->catalog->engine = $post['engine'];
            $this->catalog->milage = $post['milage'];
            $this->catalog->transmission = $post['transmission'];
            $this->catalog->transportCostPerKm = $post['transportCostPerKm'];
            $this->catalog->price = $post['price'];
        }
        $this->catalog->title = $post['title'];
        $this->catalog->text = $post['text'];
        $active = ($post['active'] == 'on') ? 1 : 0;
        $this->catalog->active = $active;
        $this->catalog->user = $_SESSION['id'];

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
            $this->catalog->brand = $post['brand'];
            $this->catalog->type = $post['type'];
            $this->catalog->year = $post['year'];
            $this->catalog->state = $post['state'];
            $this->catalog->engine = $post['engine'];
            $this->catalog->milage = $post['milage'];
            $this->catalog->transmission = $post['transmission'];
            $this->catalog->transportCostPerKm = $post['transportCostPerKm'];
            $this->catalog->price = $post['price'];
            $this->catalog->identifier = $id;
        }
        $this->catalog->title = $post['title'];
        $this->catalog->text =$post['text'];
        $active = ($post['active'] == 'on') ? 1 : 0;
        $this->catalog->setActive = $active;
        $this->catalog->setUser = $_SESSION['id'];
        $this->catalog->setId = $id;

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

    public function getBrands() {
        return $this->daocatalog->getBrands();
    }

    public function getCar($id) {
        $this->catalog = new Car();
        $this->daocatalog->get($this->catalog, $id);
        return $this->catalog;
    }

    public function view($data) {
        $this->tpl->assign('data', $data);
        $this->tpl->display('overview.tpl');
    }

    public function remove($id) {
        return $this->daocatalog->delete($id);
    }

    public function getEntries($max = 0) {
        if ($max == 0) {
            return $this->daocatalog->getEntries();
        } else {
            return $this->daocatalog->getEntries($max);
        }
    }

    public function getLastEntries($max = 0) {
        if ($max == 0) {
            return $this->daocatalog->getLastEntries();
        } else {
            return $this->daocatalog->getLastEntries($max);
        }
    }

    public function getEntriesByPage($page, $total) {
        if ($page == 1) {
            $start = 0;
        } else {
            $start = ($page - 1) * $total;
        }
        return $this->daocatalog->getEntriesByPage($start, $total);
    }

    public function deleteImage($url) {
        $url = str_replace(url, '', $url);
        if(file_exists($url)) {
            if (@unlink($url)) {
                echo 'true';
            } else {
                echo 'false';
            }
        } else {
            echo 'false';
        }
    }

    public function getCars($brand, $type, $price) {
        $cars = $this->daocatalog->getCars($brand, $type, $price);
        $this->tpl->assign('data', $cars);
        $this->tpl->assign('url', url);
        return $this->tpl->fetch('frontend-catalog.tpl');
    }

    public function getTypes($brand) {
        return $this->daocatalog->getTypes($brand);
    }

    public static function resizeToHeight($_height, $image) {
        list($width, $height, $type, $attr)= getimagesize($image);
        $ratio = $_height / $height;
        $width = $width * $ratio;
        return array('width' => round($width), 'height' => round($_height));
    }

    public static function resizeToWidth($_width, $image) {
        list($width, $height, $type, $attr)= getimagesize($image);
        $ratio = $_width / $width;
        $height = $height * $ratio;
        return array('width' => round($_width), 'height' => round($height));
    }

    public static function parseImages($id) {
        return explode(',', file_get_contents(cms . 'ajax.php?module=catalog&action=get-images&item=' . $id));
    }

    public static function parseThumbsImages($id) {
        return explode(',', str_replace('/' . $id . '/', '/' . $id . '/thumb_small/', file_get_contents(cms . 'ajax.php?module=catalog&action=get-images&item=' . $id)));
    }

    public static function parseImage($id) {
        return explode(',', file_get_contents(cms . 'ajax.php?module=catalog&action=get-first-image&item=' . $id));
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

    public static function getMainimage($id) {
        $daocatalog = new DaoCatalog();
        return $daocatalog->getMainimageByCar($id);
    }

    public static function getMainimageAndThumbs($id) {
        $daocatalog = new DaoCatalog();
        $main = $daocatalog->getMainimageByCar($id);
        $medium = str_replace($id . '/', $id . '/thumb_medium/', $main);
        $small = str_replace($id . '/', $id . '/thumb_small/', $main);

        $images = array($medium,$medium,$small);
        return $images;
    }

    public static function getImages($id) {
        // create an array to hold directory list
        $results = array();
        $directory = cms . theme . "images/catalog/" . $id . "/";
        // create a handler for the directory
        $handler = opendir($directory);

        // open directory and walk through the filenames
        while ($file = readdir($handler)) {
            // if file isn't this directory or its parent, add it to the results
            if ($file != "." && $file != ".." && $file != 'cache' && $file != 'thumb_medium' && $file != 'thumb_small') {
                $results[] = url . $directory . $file;
            }

        }
        // tidy up: close the handler
        closedir($handler);
        // done!
        return $results;
    }

    /* Paginering */
    public function getPaginering($current) {
        $total = $this->daocatalog->getTotalCars();
        $totalPerPage = 6;

        $pages = ceil($total / $totalPerPage);
        $this->tpl->assign('pages', $pages);
        $this->tpl->assign('current', $current);
        $this->tpl->assign('url', url);
        return $this->tpl->fetch('pagination.tpl');
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
            if ($file != "." && $file != ".." && $file != 'cache' && $file != 'thumb_medium' && $file != 'thumb_small') {
                $results[] = url . $directory . $file;
            }

        }
        // tidy up: close the handler
        closedir($handler);
        // done!
        return $results;
    }
}