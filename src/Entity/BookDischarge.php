<?php
namespace MirMigration\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Book
 * @package MirMigration\Entity
 * @ORM\Entity(repositoryClass="Doctrine\ORM\EntityRepository")
 * @ORM\Table(name="bookdischarge")
 * @Serializer\ExclusionPolicy("all")
 */
class BookDischarge
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
     * @var int
     * @ORM\Column(name="bookid", type="integer")
     * @Serializer\Expose()
     **/
    private $bookId;

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
     * @var string
     * @ORM\Column(name="lesson_link", type="string", length=255)
     * @Serializer\Expose()
     **/
    private $lessonLink;

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
     * @var boolean
     * @ORM\Column(name="cshow", type="boolean")
     * @Serializer\Expose()
     **/
    private $cshow = false;

    /**
     * @var Reader
     * @Serializer\Expose()
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\Reader")
     * @ORM\JoinColumn(name="reader", referencedColumnName="id", nullable=true)
     */
    private $reader;

    /**
     * @var BookCategory
     * @Serializer\Expose()
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\BookCategory", inversedBy="categories")
     * @ORM\JoinColumn(name="place", referencedColumnName="id", nullable=false)
     */
    private $category;

    /**
     * @var Book
     * @Serializer\Expose()
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\Book")
     * @ORM\JoinColumn(name="bookid", referencedColumnName="id", nullable=false)
     */
    private $book;

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
     * @return BookDischarge
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
     * @return BookDischarge
     */
    public function setReaderId($readerId)
    {
        $this->readerId = $readerId;
        return $this;
    }

    /**
     * @return int
     */
    public function getBookId()
    {
        return $this->bookId;
    }

    /**
     * @param int $bookId
     * @return BookDischarge
     */
    public function setBookId($bookId)
    {
        $this->bookId = $bookId;
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
     * @return BookDischarge
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
     * @return BookDischarge
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
     * @return BookDischarge
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
     * @return BookDischarge
     */
    public function setDocumentPath($documentPath)
    {
        $this->documentPath = $documentPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getLessonLink()
    {
        return $this->lessonLink;
    }

    /**
     * @param string $lessonLink
     * @return BookDischarge
     */
    public function setLessonLink($lessonLink)
    {
        $this->lessonLink = $lessonLink;
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
     * @return BookDischarge
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
     * @return BookDischarge
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
     * @return BookDischarge
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
     * @return BookDischarge
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
     * @return BookDischarge
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
     * @return BookDischarge
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
     * @return BookDischarge
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
     * @return BookDischarge
     */
    public function setReader($reader)
    {
        $this->reader = $reader;
        return $this;
    }

    /**
     * @return BookCategory
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param BookCategory $category
     * @return BookDischarge
     */
    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return Book
     */
    public function getBook()
    {
        return $this->book;
    }

    /**
     * @param Book $book
     * @return BookDischarge
     */
    public function setBook($book)
    {
        $this->book = $book;
        return $this;
    }

}
