<?php
/**
 * Developer: Hamza Betouar
 * DateTime: 1/30/17 10:14 PM
 */

namespace MirMigration\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Book
 * @package MirMigration\Entity
 * @ORM\Entity(repositoryClass="MirMigration\Repository\ArticleRepository")
 * @ORM\Table(name="papers")
 * @Serializer\ExclusionPolicy("all")
 */

class Paper
{

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
     * @ORM\Column(name="subject", type="string", length=255)
     * @Serializer\Expose()
     **/
    private $subject;

    /**
     * @var string
     * @ORM\Column(name="description", type="text")
     * @Serializer\Expose()
     **/
    private $description;

    /**
     * @var \DateTime
     * @ORM\Column(name="date", type="date")
     * @Serializer\Expose()
     **/
    private $date;

    /**
     * @var string
     * @ORM\Column(name="pic", type="string", length=255)
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $picture;

    /**
     * @var PaperCategory
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\PaperCategory")
     * @ORM\JoinColumn(name="place", referencedColumnName="id", nullable=true)
     */
    private $category;

    /**
     * @return int
     * @Serializer\VirtualProperty()
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
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
     * @param int $topic
     * @return Article
     */
    public function setPlace($topic)
    {
        $this->place = $topic;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     * @return Article
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
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
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     * @return Article
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
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
     * @return Article
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    public function check(){
        if( in_array($this->place, [0,40] ) )
            $this->category = null;
        else
            $this->getCategory()->check();
    }
    /**
     * @Serializer\VirtualProperty()
     */
    public function getCategoryId(){
        return $this->getCategory() == null ? $this->place : $this->getCategory()->getId();
    }

    /**
     * @Serializer\VirtualProperty()
     */
    public function getCategoryName(){
        return $this->getCategory() == null ? "UNCATEGORIZED" : $this->getCategory()->getName();
    }

    /**
     * @Serializer\VirtualProperty()
     */
    public function getUrlPicture(){
        return 'http://old.miraath.net/'.str_replace('../','', $this->picture);
    }
}