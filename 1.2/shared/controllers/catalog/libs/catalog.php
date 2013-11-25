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
            $this->catalog->setLocation($post['location']);
            $this->catalog->setYoutube($post['youtube']);
        }
        $this->catalog->setTitle($post['title']);
        $this->catalog->setText($post['text']);
        $active = ($post['active'] == 'on') ? 1 : 0;
        $this->catalog->setActive($active);
        if (defined('use_free_fields')) {
            $this->catalog->setFreeFieldOne($post['free_field_one']);
            $this->catalog->setFreeFieldTwo($post['free_field_two']);
            $this->catalog->setFreeBooleanOne($post['free_boolean_one']);
        }
        $this->catalog->setUser($_SESSION['id']);

        return $this->daocatalog->save($this->catalog);
    }

    public function update($post = array(), $files = array(), $id) {
        /*
            Save the catalog item, the variables are as follow:

            $post:      The values of the completed form
        */
        $pictures = $this->pictures($files, $id);
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
            $this->catalog->setLocation($post['location']);
            if (empty($post['mainimage']) && count($pictures) > 0) {
                $this->catalog->setMainimage($pictures[0]);
            } else {
                $this->catalog->setMainimage($post['mainimage']);
            }
            $this->catalog->setIdentifier($id);
        }
        $this->catalog->setTitle($post['title']);
        $this->catalog->setText($post['text']);
        $active = ($post['active'] == 'on') ? 1 : 0;
        $this->catalog->setActive($active);
        $this->catalog->setUser($_SESSION['id']);
        $this->catalog->setId($id);
        $this->catalog->setYoutube($post['youtube']);
        if (defined('use_free_fields')) {
            $this->catalog->setFreeFieldOne($post['free_field_one']);
            $this->catalog->setFreeFieldTwo($post['free_field_two']);
            $this->catalog->setFreeBooleanOne($post['free_boolean_one']);
        }

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

    public function getCars($brand, $type, $price) {
        $cars = $this->daocatalog->getCars($brand, $type, $price);
        $this->tpl->assign('data', $cars);
        return $this->tpl->fetch('frontend-catalog.tpl');
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

    public static function getImage($id) {
        // create an array to hold directory list
        $results = array();
        $directory = theme . "images/catalog/" . $id . "/";
        //echo $directory . '<br />';
        if (is_dir($directory)) {
            // create a handler for the directory
            $handler = opendir($directory);
            // open directory and walk through the filenames
            while ($file = readdir($handler)) {
                // if file isn't this directory or its parent, add it to the results
                if ($file != "." && $file != ".." && $file != 'cache' && $file != 'thumb_medium' && $file != 'thumb_small') {
                    $file = str_replace('1', '', $file);
                    // tidy up: close the handler
                    closedir($handler);
                    return url . $directory . $file;
                }
            }
            // done!
            // tidy up: close the handler
            closedir($handler);
        }

        return null;
    }


    public static function parseImages($id) {
        return explode(',', file_get_contents(url . 'ajax.php?module=catalog&action=get-images&item=' . $id));
    }

    public static function parseImage($id) {
        return explode(',', file_get_contents(url . 'ajax.php?module=catalog&action=get-first-image&item=' . $id));
    }

    private function pictures($files = array(), $id) {
        $pictures = array();
        if (strlen($files['pictures']['tmp_name'][0]) > 0 and count($files['pictures']['tmp_name']) > 0){
            $errors= array();
            foreach($files['pictures']['tmp_name'] as $key => $tmp_name ){
                $file_name = strtolower(str_replace(",", "", str_replace(" ", "-", $files['pictures']['name'][$key])));
                $file_size =$files['pictures']['size'][$key];
                $file_tmp =$files['pictures']['tmp_name'][$key];
                $file_type=$files['pictures']['type'][$key];
                if($file_size > 16777216){
                    $errors[]='File size must be less than 16MB';
                }
                $desired_dir= theme . "images/catalog/" . $id . "/";
                $filename =$desired_dir.$file_name;
                if(empty($errors)==true){
                    if(is_dir($desired_dir)==false){
                        mkdir("$desired_dir", 0777);
                        // Create directory if it does not exist
                    }
                    if(is_dir("$desired_dir/".$file_name)==false){
                        move_uploaded_file($file_tmp,$desired_dir.$file_name);
                        $this->resize($desired_dir.$file_name, 768);
                        if (is_dir($desired_dir . 'thumb_medium/')) {
                            $this->resizeWidth($file_name, $desired_dir, $desired_dir . 'thumb_medium/', 500);
                        } else {
                            mkdir($desired_dir . 'thumb_medium/');
                            $this->resizeWidth($file_name, $desired_dir, $desired_dir . 'thumb_medium/', 500);
                        }
                        if (is_dir($desired_dir . 'thumb_small/')) {
                            $this->resizeWidth($file_name, $desired_dir, $desired_dir . 'thumb_small/', 205);
                        } else {
                            mkdir($desired_dir . 'thumb_small/');
                            $this->resizeWidth($file_name, $desired_dir, $desired_dir . 'thumb_small/', 205);
                        }
                    }else{
                        //rename the file if another one exist
                        $new_dir=$desired_dir.$file_name.time();
                        rename($file_tmp,$new_dir) ;
                        $this->resize($new_dir, 768);
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
        return $pictures;
    }

    private function resizeWidth($originalFilename, $originalDir, $newDir, $new_width) {
        list($width, $height) = getimagesize($originalDir.$originalFilename);
        $new_height = round(($height * $new_width) / $width);

        $imageResized = imagecreatetruecolor($new_width, $new_height);
        $imageTmp     = imagecreatefromjpeg ($originalDir.$originalFilename);
        imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        imagejpeg($imageResized, $newDir.$originalFilename, 60);
        imageDestroy($imageResized);
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

    public function getTypes($brand) {
        return $this->daocatalog->getTypes($brand);
    }

    private function resize($originalImage,$new_height) {
        list($width, $height) = getimagesize($originalImage);
        $new_width = round(($width * $new_height) / $height);

        $imageResized = imagecreatetruecolor($new_width, $new_height);
        $imageTmp     = imagecreatefromjpeg ($originalImage);
        imagecopyresampled($imageResized, $imageTmp, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        imagejpeg($imageResized, $originalImage, 100);
        imageDestroy($imageResized);
    }

    public function getImages($id) {

        // create an array to hold directory list
        $results = array();
        $directory = theme . "images/catalog/" . $id . "/";
        if (is_dir($directory)) {
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
        }

        return $results;
    }

    public function getPictures($id) {
        // create an array to hold directory list
        $results = array();
        $directory = theme . "images/catalog/" . $id . "/";
        if (is_dir($directory)) {
            // create a handler for the directory
            $handler = opendir($directory);
            // open directory and walk through the filenames
            while ($file = readdir($handler)) {
                // if file isn't this directory or its parent, add it to the results
                if ($file != '.' && $file != '..' && $file != 'cache' && $file != 'thumb_medium' && $file != 'thumb_small') {
                    $results[] = url . $directory . $file;
                } else if ($file != 'cache') {
                }
            }
            // tidy up: close the handler
            closedir($handler);
            // done!
        }
        return $results;
    }
}