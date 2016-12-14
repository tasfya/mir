<?php
namespace MirMigration\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Reader
 * @package MirMigration\Entity
 * @ORM\Entity(repositoryClass="Doctrine\ORM\EntityRepository")
 * @ORM\Table(name="sounds")
 * @Serializer\ExclusionPolicy("all")
 */
class Sound{


    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Serializer\Expose()
     **/
    private $id;

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
     * @ORM\Column(name="path", type="string", length=255)
     * @Serializer\Expose()
     **/
    private $path;

    /**
     * @var string
     * @ORM\Column(name="docpath", type="string", length=255)
     * @Serializer\Expose()
     **/
    private $documentPath;

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
     * @var string
     * @ORM\Column(name="duration", type="string", length=50)
     * @Serializer\Expose()
     **/
    private $duration;

    /**
     * @var string
     * @ORM\Column(name="soundsize", type="string", length=50)
     * @Serializer\Expose()
     **/
    private $soundSize;

    /**
     * @var int
     * @ORM\Column(name="addby", type="integer")
     * @Serializer\Expose()
     **/
    private $addBy;

    /**
     * @var int
     * @ORM\Column(name="place", type="integer")
     * @Serializer\Expose()
     **/
    private $place;

    /**
     * @var bool
     * @ORM\Column(name="waiting", type="boolean")
     * @Serializer\Expose()
     **/
    private $waiting = false;

    /**
     * @var bool
     * @ORM\Column(name="cshow", type="boolean")
     * @Serializer\Expose()
     **/
    private $cshow = false;

    /**
     * @Serializer\Expose()
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\Reader")
     * @ORM\JoinColumn(name="reader", referencedColumnName="id", nullable=true)
     */
    private $reader;

    /**
     * @Serializer\Expose()
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\SoundCategory")
     * @ORM\JoinColumn(name="place", referencedColumnName="id", nullable=false)
     */
    private $category;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @return Sound
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
     * @return Sound
     */
    public function setDescription($description)
    {
        $this->description = $description;
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
     * @return Sound
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocumentPath()
    {
        return $this->documentPath;
    }

    /**
     * @param string $documentPath
     * @return Sound
     */
    public function setDocumentPath($documentPath)
    {
        $this->documentPath = $documentPath;
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
     * @return Sound
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
     * @return Sound
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
     * @return Sound
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
     * @return Sound
     */
    public function setDownloadNo($downloadNo)
    {
        $this->downloadNo = $downloadNo;
        return $this;
    }

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     * @return Sound
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
        return $this;
    }

    /**
     * @return string
     */
    public function getSoundSize()
    {
        return $this->soundSize;
    }

    /**
     * @param string $soundSize
     * @return Sound
     */
    public function setSoundSize($soundSize)
    {
        $this->soundSize = $soundSize;
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
     * @return Sound
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
     * @return Sound
     */
    public function setWaiting($waiting)
    {
        $this->waiting = $waiting;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCshow()
    {
        return $this->cshow;
    }

    /**
     * @param bool $cshow
     * @return Sound
     */
    public function setCshow($cshow)
    {
        $this->cshow = $cshow;
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
     * @return Sound
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
     * @return Sound
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
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
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @Serializer\VirtualProperty()
     */
    public function getDateTimestamp(){
        return $this->getDate()->getTimestamp();
    }




}