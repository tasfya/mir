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
 * @ORM\Table(name="articles")
 * @Serializer\ExclusionPolicy("all")
 */

class Article
{

    const CODE = 666;

    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     **/
    private $id;

    /**
     * @var int
     * @ORM\Column(name="topic", type="integer")
     * @Serializer\Expose()
     **/
    private $topic;

    /**
     * @var int
     * @ORM\Column(name="reader", type="integer")
     * @Serializer\Expose()
     **/
    private $readerId;

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
     * @var string
     * @ORM\Column(name="text", type="text")
     * @Serializer\Expose()
     **/
    private $text;

    /**
     * @var \DateTime
     * @ORM\Column(name="date", type="date")
     * @Serializer\Expose()
     **/
    private $date;

    /**
     * @var int
     * @ORM\Column(name="counter", type="integer")
     * @Serializer\Expose()
     **/
    private $counter;

    /**
     * @var Reader
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\Reader")
     * @ORM\JoinColumn(name="reader", referencedColumnName="id", nullable=true)
     */
    private $reader;

    /**
     * @var ArticleCategory
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\ArticleCategory")
     * @ORM\JoinColumn(name="topic", referencedColumnName="id", nullable=true)
     */
    private $category;

    /**
     * @return int
     * @Serializer\VirtualProperty()
     */
    public function getId()
    {
        return self::CODE.$this->id;
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
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * @param int $topic
     * @return Article
     */
    public function setTopic($topic)
    {
        $this->topic = $topic;
        return $this;
    }

    /**
     * @return int
     */
    public function getReaderId()
    {
        return $this->readerId;
    }

    /**
     * @param int $readerId
     * @return Article
     */
    public function setReaderId($readerId)
    {
        $this->readerId = $readerId;
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
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return Article
     */
    public function setText($text)
    {
        $this->text = $text;
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
     * @return int
     */
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * @param int $counter
     * @return Article
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReader()
    {
        return $this->reader;
    }

    /**
     * @param mixed $reader
     * @return Article
     */
    public function setReader($reader)
    {
        $this->reader = $reader;
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
        if( in_array($this->topic, [0] ) )
            $this->category = null;
        else
            $this->getCategory()->check();
        if( in_array($this->readerId, [0] ) )
            $this->reader = null;
    }

    /**
     * @Serializer\VirtualProperty()
     */
    public function getScholarId(){
        return $this->getReader() == null ? $this->readerId : $this->getReader()->getScholarId();
    }

    /**
     * @Serializer\VirtualProperty()
     */
    public function getScholarName(){
        return $this->getReader() == null ? "" : $this->getReader()->getName();
    }

    /**
     * @Serializer\VirtualProperty()
     */
    public function getCategoryId(){
        return $this->getCategory() == null ? $this->topic : $this->getCategory()->getId();
    }

    /**
     * @Serializer\VirtualProperty()
     */
    public function getCategoryName(){
        return $this->getCategory() == null ? "" : $this->getCategory()->getName();
    }
}