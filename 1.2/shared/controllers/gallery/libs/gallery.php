<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef
 * Date: 28-12-12
 * Time: 00:18
 */

require(classes . 'gallery/gallery.php');
require(classes . 'gallery/pictures.php');
require(classes . 'gallery/daogallery.php');

class CGallery {
    private $gallery = null;
    private $dgallery = null;
    private $tpl = null;
    private $error = null;

    public function __construct() {
        // Instantiate the object
        $this->tpl = new SGallery();
        $this->gallery = new Gallery();
        $this->dgallery = new DGallery();
    }

    public function create($post = array()) {
        /*
            Save the catalog item, the variables are as follow:

            $post:      The values of the completed form
        */
        $this->gallery->setName($post['name']);
        $this->gallery->setDescription($post['description']);
        $active = ($post['active'] == 'on') ? 1 : 0;
        $this->gallery->setActive($active);
        $this->gallery->setUser($_SESSION['id']);

        return $this->dgallery->create($this->gallery);
    }

    public function update($post = array(), $id) {
        /*
            Save the catalog item, the variables are as follow:

            $post:      The values of the completed form
        */
        $this->gallery = $this->dgallery->get($id);
        $this->gallery->setName($post['name']);
        $this->gallery->setDescription($post['description']);
        $active = ($post['active'] == 'on') ? 1 : 0;
        $this->gallery->setActive($active);
        $this->gallery->setUser($_SESSION['id']);
        $this->gallery->setId($id);

        return $this->dgallery->update($this->gallery);
    }

    public function form($post = array(), $id = 0) {
        /*
            Show the creation form, the variable are as follow:

            $post:  The post values of the not completed form
            $type:  The type of catalog item to create
        */

        $this->gallery = $this->dgallery->get($id);
        $pictures = $this->dgallery->getPictures($id);
        $this->tpl->assignByRef('gallery', $this->gallery);
        $this->tpl->assignByRef('pictures', $pictures);
        $this->tpl->assignByRef('post', $post);
        $this->tpl->display('form.tpl');
    }

    public function view($data) {
        $this->tpl->assign('data', $data);
        $this->tpl->display('overview.tpl');
    }

    public function remove($id) {
        return $this->dgallery->delete($id);
    }

    public function getEntries() {
        return $this->dgallery->getEntries();
    }

    public function upload($post, $files, $album) {
        $file = $this->pictures($files, $album);

        if ($file != '') {
            $picture = new Picture();
            $picture->setAlbum($album);
            $picture->setUrl($file);
            $picture->setUser($_SESSION['id']);
            $picture->setActive(1);

            $id = $this->dgallery->createPicture($picture);
        }

        if ($id != null) {
            return true;
        }
        return false;
    }

    private function pictures($files = array(), $id) {
        $pictures = array();
        if (strlen($files['picture']['tmp_name']) > 0){
            $errors= array();
            $file_name = strtolower(str_replace(",", "", str_replace(" ", "-", $files['picture']['name'])));
            $file_size =$files['picture']['size'];
            $file_tmp =$files['picture']['tmp_name'];
            $file_type=$files['picture']['type'];
            if($file_size > 16777216){
                $errors[]='File size must be less than 16MB';
            }
            $desired_dir= 'user_images/albums/' . $id . '/';
            $filename =$desired_dir.$file_name;
            if(empty($errors)==true){
                if(is_dir($desired_dir)==false){
                    mkdir($desired_dir, 0700);
                    // Create directory if it does not exist
                }
                if(is_dir("$desired_dir/".$file_name)==false){
                    move_uploaded_file($file_tmp,$desired_dir.$file_name);
                }else{
                    //rename the file if another one exist
                    $new_dir=$desired_dir.$file_name.time();
                    rename($file_tmp,$new_dir) ;
                }
            }else{
                print_r($errors);
            }
        }
        return $filename;
    }
}