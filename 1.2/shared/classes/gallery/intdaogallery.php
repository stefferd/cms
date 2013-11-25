<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 05-06-13
 * Time: 21:38
 */
require_once(classes. 'gallery/gallery.php');

interface IDGallery
{
    /* Backend */
    public function create(Gallery $gallery);
    public function update(Gallery $gallery);
    public function delete($id);
    public function get($id);
    public function getEntries($max = 15);
}
