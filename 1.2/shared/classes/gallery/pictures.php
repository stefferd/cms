<?php
/**
 * Created by van den Berg Multimedia
 * User: Stef van den Berg
 * Date: 05-06-13
 * Time: 21:38
 */
class Picture
{
    protected $id;
    protected $url;
    protected $active;
    protected $created;
    protected $updated;
    protected $user;
    protected $album;

    public function Picture($id = 0, $url = '', $active = 0, $created = '', $updated = '', $user = 0, $album = 0) {
        $this->id = $id;
        $this->url = $url;
        $this->active = $active;
        $this->created = $created;
        $this->updated = $updated;
        $this->user = $user;
        $this->album = $album;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active)
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function &getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $album
     */
    public function setAlbum($album)
    {
        $this->album = $album;
    }

    /**
     * @return mixed
     */
    public function &getAlbum()
    {
        return $this->album;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return mixed
     */
    public function &getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function &getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return mixed
     */
    public function &getUrl()
    {
        return $this->url;
    }

    /**
     * @param mixed $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return mixed
     */
    public function &getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function &getUser()
    {
        return $this->user;
    }


}
