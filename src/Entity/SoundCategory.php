<?php
namespace MirMigration\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Reader
 * @package MirMigration\Entity
 * @ORM\Entity(repositoryClass="MirMigration\Repository\SoundCategoryRepository")
 * @ORM\Table(name="soundcat")
 * @Serializer\ExclusionPolicy("all")
 */
class SoundCategory{

    const CODE = 222;
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $id;

    /**
     * @var int
     * @ORM\Column(name="place", type="integer")
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $place;

    /**
     * @var string
     * @ORM\Column(name="name", type="string", length=50)
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $name;

    /**
     * @var string
     * @ORM\Column(name="description", type="text")
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $description;

    /**
     * @var int
     * @ORM\Column(name="cshow", type="integer")
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $cshow;

    /**
     * @var SoundCategory $category
     * @Serializer\Expose()
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\SoundCategory", inversedBy="categories")
     * @ORM\JoinColumn(name="place", referencedColumnName="id", nullable=false)
     * @Serializer\Since("1.0")
     */
    private $category;

    /**
     * @Serializer\Expose()
     * @Serializer\MaxDepth(2)
     * @ORM\OneToMany(targetEntity="\MirMigration\Entity\SoundCategory", mappedBy="category")
     * @Serializer\Since("1.0")
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
     * @return SoundCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param SoundCategory $category
     * @return SoundCategory
     */
    public function setCategory(SoundCategory $category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param mixed $categories
     * @return SoundCategory
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }

    public function check()
    {
        if (in_array($this->place, [0])) {
            $this->category = null;
        } else {
            $this->category->check();
        }
    }

    public function getMoutounes(){
        $moutounes = [];
        foreach ($this->categories as $category){
            /** @var SoundCategory $category */
            $moutounes = array_merge($moutounes, $category->getCategories()->toArray());
        }
        return $moutounes;
    }

    /**
     * @Serializer\SerializedName("id")
     * @Serializer\VirtualProperty()
     * @Serializer\Since("0.1")
     * @return string
     */
    public function getMoutouneId(){
        return $this->id;
    }

    /**
     * @Serializer\VirtualProperty()
     * @Serializer\Since("0.1")
     * @return string
     */
    public function getTitle(){
        return str_replace('شرح ', '', $this->name);
    }

    /**
     * @Serializer\SerializedName("old_id")
     * @Serializer\VirtualProperty()
     * @Serializer\Since("0.1")
     * @return string
     */
    public function getOldId(){
        return $this->id;
    }

}
