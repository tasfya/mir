<?php
namespace MirMigration\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Book
 * @package MirMigration\Entity
 * @ORM\Entity(repositoryClass="Doctrine\ORM\EntityRepository")
 * @ORM\Table(name="books")
 * @Serializer\ExclusionPolicy("all")
 */
class Book
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
     * @ORM\Column(name="pic", type="string", length=255)
     * @Serializer\Expose()
     **/
    private $picture;

    /**
     * @var string
     * @ORM\Column(name="path", type="string", length=255)
     * @Serializer\Expose()
     **/
    private $path;

    /**
     * @var int
     * @ORM\Column(name="hits", type="integer")
     * @Serializer\Expose()
     **/
    private $hits;

    /**
     * @var string
     * @ORM\Column(name="time", type="string", length=255)
     * @Serializer\Expose()
     **/
    private $time;

    /**
     * @var \DateTime
     * @ORM\Column(name="date", type="date")
     * @Serializer\Expose()
     **/
    private $date;

    /**
     * @var int
     * @ORM\Column(name="downloadno", type="integer")
     * @Serializer\Expose()
     **/
    private $downloadNo;

    /**
     * @var int
     * @ORM\Column(name="addby", type="integer")
     * @Serializer\Expose()
     **/
    private $addBy;

    /**
     * @var boolean
     * @ORM\Column(name="waiting", type="boolean")
     * @Serializer\Expose()
     **/
    private $waiting = false;

    /**
     * @Serializer\Expose()
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\Reader")
     * @ORM\JoinColumn(name="reader", referencedColumnName="id", nullable=true)
     */
    private $reader;

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
     * @return Book
     */
    public function setPlace($place)
    {
        $this->place = $place;
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
     * @return Book
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
     * @return Book
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
     * @return Book
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     * @return Book
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
        return $this;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return Book
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return int
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * @param int $hits
     * @return Book
     */
    public function setHits($hits)
    {
        $this->hits = $hits;
        return $this;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param string $time
     * @return Book
     */
    public function setTime($time)
    {
        $this->time = $time;
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
     * @return Book
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return int
     */
    public function getDownloadNo()
    {
        return $this->downloadNo;
    }

    /**
     * @param int $downloadNo
     * @return Book
     */
    public function setDownloadNo($downloadNo)
    {
        $this->downloadNo = $downloadNo;
        return $this;
    }

    /**
     * @return int
     */
    public function getAddBy()
    {
        return $this->addBy;
    }

    /**
     * @param int $addBy
     * @return Book
     */
    public function setAddBy($addBy)
    {
        $this->addBy = $addBy;
        return $this;
    }

    /**
     * @return bool
     */
    public function isWaiting()
    {
        return $this->waiting;
    }

    /**
     * @param bool $waiting
     * @return Book
     */
    public function setWaiting($waiting)
    {
        $this->waiting = $waiting;
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
     * @return Book
     */
    public function setReader($reader)
    {
        $this->reader = $reader;
        return $this;
    }
}
