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
     * @var int
     * @ORM\Column(name="cshow", type="integer")
     * @Serializer\Expose()
     **/
    private $cshow;

    /**
     * @var ArticleCategory $category
     * @Serializer\Expose()
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\BookCategory", inversedBy="subCategories")
     * @ORM\JoinColumn(name="place", referencedColumnName="id", nullable=false)
     */
    private $parent;

    /**
     * @var ArticleCategory[]
     * @Serializer\Expose()
     * @Serializer\MaxDepth(2)
     * @ORM\OneToMany(targetEntity="\MirMigration\Entity\BookCategory", mappedBy="parent")
     */
    private $subCategories;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getPlace(): int
    {
        return $this->place;
    }

    /**
     * @param int $place
     * @return ArticleCategory
     */
    public function setPlace(int $place): ArticleCategory
    {
        $this->place = $place;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return ArticleCategory
     */
    public function setName(string $name): ArticleCategory
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return ArticleCategory
     */
    public function setDescription(string $description): ArticleCategory
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getCshow(): int
    {
        return $this->cshow;
    }

    /**
     * @param int $cshow
     * @return ArticleCategory
     */
    public function setCshow(int $cshow): ArticleCategory
    {
        $this->cshow = $cshow;
        return $this;
    }

    /**
     * @return ArticleCategory
     */
    public function getParent(): ArticleCategory
    {
        return $this->parent;
    }

    /**
     * @param ArticleCategory $parent
     * @return ArticleCategory
     */
    public function setParent(ArticleCategory $parent): ArticleCategory
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


}