<?php
namespace MirMigration\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Category
 * @package MirMigration\Entity
 * @ORM\Entity(repositoryClass="MirMigration\Entity\CategoryRepository")
 * @ORM\Table(name="category")
 * @Serializer\ExclusionPolicy("all")
 */
class Category
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     **/
    private $id;

    /**
     * @var int
     * @ORM\Column(name="place", type="integer")
     * @Serializer\Expose()
     **/
    private $place;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=150)
     * @Serializer\Expose()
     **/
    private $name;

    /**
     * @var string
     * @ORM\Column(name="description", type="text")
     * @Serializer\Expose()
     **/
    private $description;

    /**
     * @var string
     * @ORM\Column(name="met_key", type="text")
     * @Serializer\Expose()
     **/
    private $metKey;

    /**
     * @var string
     * @ORM\Column(name="met_desc", type="text")
     * @Serializer\Expose()
     **/
    private $metDesc;

    /**
     * @var boolean
     * @ORM\Column(name="c_show", type="boolean")
     * @Serializer\Expose()
     **/
    private $cShow;

    /**
     * @var boolean
     * @ORM\Column(name="show_mean", type="boolean")
     * @Serializer\Expose()
     **/
    private $showMean;

    /**
     * @var int
     * @ORM\Column(name="ask_count", type="integer")
     * @Serializer\Expose()
     **/
    private $askCount;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     * @return Category
     */
    public function setPlace($place)
    {
        $this->place = $place;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetKey()
    {
        return $this->metKey;
    }

    /**
     * @param string $metKey
     * @return Category
     */
    public function setMetKey($metKey)
    {
        $this->metKey = $metKey;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetDesc()
    {
        return $this->metDesc;
    }

    /**
     * @param string $metDesc
     * @return Category
     */
    public function setMetDesc($metDesc)
    {
        $this->metDesc = $metDesc;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCShow()
    {
        return $this->cShow;
    }

    /**
     * @param bool $cShow
     * @return Category
     */
    public function setCShow($cShow)
    {
        $this->cShow = $cShow;
        return $this;
    }

    /**
     * @return bool
     */
    public function isShowMean()
    {
        return $this->showMean;
    }

    /**
     * @param bool $showMean
     * @return Category
     */
    public function setShowMean($showMean)
    {
        $this->showMean = $showMean;
        return $this;
    }

    /**
     * @return int
     */
    public function getAskCount()
    {
        return $this->askCount;
    }

    /**
     * @param int $askCount
     * @return Category
     */
    public function setAskCount($askCount)
    {
        $this->askCount = $askCount;
        return $this;
    }
}