<?php
namespace MirMigration\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Reader
 * @package MirMigration\Entity
 * @ORM\Entity(repositoryClass="Doctrine\ORM\EntityRepository")
 * @ORM\Table(name="soundcat")
 * @Serializer\ExclusionPolicy("all")
 */
class SoundCategory{
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
     * @ORM\Column(name="name", type="string", length=50)
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
     * @var int
     * @ORM\Column(name="cshow", type="integer")
     * @Serializer\Expose()
     **/
    private $cshow;

    /**
     * @var SoundCategory $category
     * @Serializer\Expose()
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\SoundCategory", inversedBy="categories")
     * @ORM\JoinColumn(name="place", referencedColumnName="id", nullable=false)
     */
    private $category;

    /**
     * @Serializer\Expose()
     * @Serializer\MaxDepth(2)
     * @ORM\OneToMany(targetEntity="\MirMigration\Entity\SoundCategory", mappedBy="category")
     */
    private $categories;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param int $place
     * @return SoundCategory
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
     * @return SoundCategory
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
     * @return SoundCategory
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getCshow()
    {
        return $this->cshow;
    }

    /**
     * @param int $cshow
     * @return SoundCategory
     */
    public function setCshow($cshow)
    {
        $this->cshow = $cshow;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    public function check(){
        if( in_array($this->place, [0]) ) {
            $this->category = null;
        }
        else {
            $this->category->check();
        }
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }



}