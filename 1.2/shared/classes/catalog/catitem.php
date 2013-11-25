<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 27-12-12
 * Time: 18:19
 */
class CatItem
{
    protected $id;
    protected $title;
    protected $text;
    protected $active;
    protected $created;
    protected $updated;
    protected $user;
    protected $youtube;
    protected $free_field_one;
    protected $free_field_two;
    protected $free_boolean_one;

    public function CatItem($id = 0, $title = '', $text = '', $active = 0, $created = '', $updated = '', $user = 0, $youtube = '') {
        $this->setId($id);
        $this->setTitle($title);
        $this->setText($text);
        $this->setActive($active);
        $this->setCreated($created);
        $this->setUpdated($updated);
        $this->setUser($user);
        $this->setYoutube($youtube);
        $this->setFreeFieldOne('');
        $this->setFreeFieldTwo('');
        $this->setFreeBooleanOne(0);
    }

    public function setId($id) { $this->id = $id; }
    public function &getId() { return $this->id; }

    public function setTitle($title) { $this->title = $title; }
    public function &getTitle() { return $this->title; }

    public function setText($text) { $this->text = $text; }
    public function &getText() { return stripslashes($this->text); }

    public function setActive($active) { $this->active = $active; }
    public function &getActive() { return $this->active; }

    public function setCreated($created) { $this->created = $created; }
    public function &getCreated() { return $this->created; }

    public function setUpdated($updated) { $this->updated = $updated; }
    public function &getUpdated() { return $this->updated; }

    public function setUser($user) { $this->user = $user; }
    public function &getUser() { return $this->user; }

    public function setYoutube($youtube){ $this->youtube = $youtube; }
    public function &getYoutube() { return $this->youtube; }

    /**
     * @param mixed $free_field_one
     */
    public function setFreeFieldOne($free_field_one)
    {
        $this->free_field_one = $free_field_one;
    }

    /**
     * @return mixed
     */
    public function &getFreeFieldOne()
    {
        return $this->free_field_one;
    }

    /**
     * @param mixed $free_field_two
     */
    public function setFreeFieldTwo($free_field_two)
    {
        $this->free_field_two = $free_field_two;
    }

    /**
     * @return mixed
     */
    public function &getFreeFieldTwo()
    {
        return $this->free_field_two;
    }

    /**
     * @param mixed $free_boolean_one
     */
    public function setFreeBooleanOne($free_boolean_one)
    {
        $this->free_boolean_one = $free_boolean_one;
    }

    /**
     * @return mixed
     */
    public function &getFreeBooleanOne()
    {
        return $this->free_boolean_one;
    }


}
