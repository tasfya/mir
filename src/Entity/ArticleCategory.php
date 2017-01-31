<?php
/**
 * Developer: Hamza Betouar
 * DateTime: 1/30/17 10:00 PM
 */

namespace MirMigration\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Book
 * @package MirMigration\Entity
 * @ORM\Entity(repositoryClass="Doctrine\ORM\EntityRepository")
 * @ORM\Table(name="articlescat")
 * @Serializer\ExclusionPolicy("all")
 */
class ArticleCategory
{

    const CODE = 555;

    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
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
     * @var int
     * @ORM\Column(name="cshow", type="integer")
     * @Serializer\Expose()
     **/
    private $cshow;

    /**
     * @var ArticleCategory $category
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\ArticleCategory", inversedBy="subCategories")
     * @ORM\JoinColumn(name="place", referencedColumnName="id", nullable=false)
     */
    private $parent;

    /**
     * @var ArticleCategory[]
     * @ORM\OneToMany(targetEntity="\MirMigration\Entity\ArticleCategory", mappedBy="parent")
     */
    private $subCategories;

    /**
     * @return int
     * @Serializer\VirtualProperty()
     */
    public function getId()
    {
        return self::CODE.$this->id;
    }

    /**
     * @Serializer\VirtualProperty()
     */
    public function getOldId()
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
     * @return ArticleCategory
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
     * @return ArticleCategory
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
     * @return ArticleCategory
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
     * @return ArticleCategory
     */
    public function setCshow($cshow)
    {
        $this->cshow = $cshow;
        return $this;
    }

    /**
     * @return ArticleCategory
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param ArticleCategory $parent
     * @return ArticleCategory
     */
    public function setParent(ArticleCategory $parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSubCategories()
    {
        return $this->subCategories;
    }

    /**
     * @param mixed $subCategories
     * @return ArticleCategory
     */
    public function setSubCategories($subCategories)
    {
        $this->subCategories = $subCategories;
        return $this;
    }

    public function check()
    {
        if (in_array($this->place, [0])) {
            $this->parent = null;
        } else {
            $this->parent->check();
        }
    }

}