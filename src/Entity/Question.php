<?php
namespace MirMigration\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Question
 * @package MirMigration\Entity
 * @ORM\Entity(repositoryClass="MirMigration\Repository\QuestionRepository")
 * @ORM\Table(name="question")
 * @Serializer\ExclusionPolicy("all")
 */
class Question{

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
     * @ORM\Column(name="content", type="text")
     * @Serializer\Expose()
     **/
    private $content;

    /**
     * @var string
     * @ORM\Column(name="answer", type="text")
     * @Serializer\Expose()
     **/
    private $answer;

    /**
     * @var string
     * @ORM\Column(name="path", type="string", length=255)
     * @Serializer\Expose()
     **/
    private $path;

    /**
     * @var \DateTime
     * @ORM\Column(name="create_date", type="date")
     * @Serializer\Expose()
     **/
    private $createdDate;

    /**
     * @var int
     * @ORM\Column(name="create_time", type="integer")
     * @Serializer\Expose()
     **/
    private $createdTime;

    /**
     * @var int
     * @ORM\Column(name="answer_count", type="integer")
     * @Serializer\Expose()
     **/
    private $answerCount;

    /**
     * @var int
     * @ORM\Column(name="hits", type="integer")
     * @Serializer\Expose()
     **/
    private $hits;

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
     * @var int
     * @ORM\Column(name="reader", type="integer")
     * @Serializer\Expose()
     **/
    private $readerId;

    /**
     * @var bool
     * @ORM\Column(name="type", type="boolean")
     * @Serializer\Expose()
     **/
    private $type = false;

    /**
     * @var bool
     * @ORM\Column(name="state", type="boolean")
     * @Serializer\Expose()
     **/
    private $state = false;

    /**
     * @var bool
     * @ORM\Column(name="answered", type="boolean")
     * @Serializer\Expose()
     **/
    private $answered = false;

    /**
     * @var bool
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
     * @var QuestionCategory
     * @Serializer\Expose()
     * @ORM\ManyToOne(targetEntity="\MirMigration\Entity\QuestionCategory")
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
     * @return Question
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Question
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param string $answer
     * @return Question
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
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
     * @return Question
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDate()
    {
        return $this->createdDate;
    }

    /**
     * @param \DateTime $createdDate
     * @return Question
     */
    public function setCreatedDate($createdDate)
    {
        $this->createdDate = $createdDate;
        return $this;
    }

    /**
     * @return int
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * @param int $createdTime
     * @return Question
     */
    public function setCreatedTime($createdTime)
    {
        $this->createdTime = $createdTime;
        return $this;
    }

    /**
     * @return int
     */
    public function getAnswerCount()
    {
        return $this->answerCount;
    }

    /**
     * @param int $answerCount
     * @return Question
     */
    public function setAnswerCount($answerCount)
    {
        $this->answerCount = $answerCount;
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
     * @return Question
     */
    public function setHits($hits)
    {
        $this->hits = $hits;
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
     * @return Question
     */
    public function setAddBy($addBy)
    {
        $this->addBy = $addBy;
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
     * @return Question
     */
    public function setPlace($place)
    {
        $this->place = $place;
        return $this;
    }

    /**
     * @return bool
     */
    public function isType()
    {
        return $this->type;
    }

    /**
     * @param bool $type
     * @return Question
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isState()
    {
        return $this->state;
    }

    /**
     * @param bool $state
     * @return Question
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAnswered()
    {
        return $this->answered;
    }

    /**
     * @param bool $answered
     * @return Question
     */
    public function setAnswered($answered)
    {
        $this->answered = $answered;
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
     * @return Question
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
     * @return Question
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
     * @return Question
     */
    public function setCategory($category)
    {
        $this->category = $category;
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
     * @return Question
     */
    public function setReaderId($readerId)
    {
        $this->readerId = $readerId;
        return $this;
    }

    public function check(){
        if( in_array($this->getPlace(), [0,52,42,27,64,99] ) )
            $this->category = null;
        else
            $this->getCategory()->check();
        if( in_array($this->getReaderId(), [0,58] ) )
            $this->reader = null;
    }

}
