<?php
namespace MirMigration\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class Reader
 * @package MirMigration\Entity
 * @ORM\Entity(repositoryClass="Doctrine\ORM\EntityRepository")
 * @ORM\Table(name="readers")
 * @Serializer\ExclusionPolicy("all")
 */
class Reader
{

    const CODE = 111;

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
     * @var string
     * @ORM\Column(name="name", type="string", length=255)
     * @Serializer\Expose()
     * @Serializer\Since("0.1")
     **/
    private $name;

    /**
     * @var string
     * @ORM\Column(name="country", type="string", length=255)
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $country;

    /**
     * @var string
     * @ORM\Column(name="pic", type="string", length=255)
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $picture;

    /**
     * @var string
     * @ORM\Column(name="description", type="text")
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $description;

    /**
     * @var string
     * @ORM\Column(name="details", type="text")
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $details;

    /**
     * @var boolean
     * @ORM\Column(name="cshow", type="boolean")
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $cshow = false;

    /**
     * @var string
     * @ORM\Column(name="email", type="string", length=255)
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $email;

    /**
     * @var string
     * @ORM\Column(name="tel", type="string", length=50)
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $phone;
    /**
     * @var string
     * @ORM\Column(name="website", type="string", length=255)
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $website;

    /**
     * @var boolean
     * @ORM\Column(name="articles", type="boolean")
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $articles = false;

    /**
     * @var boolean
     * @ORM\Column(name="library", type="boolean")
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $library = false;

    /**
     * @var boolean
     * @ORM\Column(name="question", type="boolean")
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $question = false;

    /**
     * @var boolean
     * @ORM\Column(name="sound", type="boolean")
     * @Serializer\Expose()
     * @Serializer\Since("1.0")
     **/
    private $sound = false;

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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Reader
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Reader
     */
    public function setCountry($country)
    {
        $this->country = $country;
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
     * @return Reader
     */
    public function setPicture($picture)
    {
        $this->picture = $picture;
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
     * @return Reader
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param string $details
     * @return Reader
     */
    public function setDetails($details)
    {
        $this->details = $details;
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
     * @return Reader
     */
    public function setCshow($cshow)
    {
        $this->cshow = $cshow;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Reader
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * @return Reader
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $website
     * @return Reader
     */
    public function setWebsite($website)
    {
        $this->website = $website;
        return $this;
    }

    /**
     * @return bool
     */
    public function isArticles()
    {
        return $this->articles;
    }

    /**
     * @param bool $articles
     * @return Reader
     */
    public function setArticles($articles)
    {
        $this->articles = $articles;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLibrary()
    {
        return $this->library;
    }

    /**
     * @param bool $library
     * @return Reader
     */
    public function setLibrary($library)
    {
        $this->library = $library;
        return $this;
    }

    /**
     * @return bool
     */
    public function isQuestion()
    {
        return $this->question;
    }

    /**
     * @param bool $question
     * @return Reader
     */
    public function setQuestion($question)
    {
        $this->question = $question;
        return $this;
    }

    /**
     * @return bool
     */
    public function isSound()
    {
        return $this->sound;
    }

    /**
     * @param bool $sound
     * @return Reader
     */
    public function setSound($sound)
    {
        $this->sound = $sound;
        return $this;
    }

    /**
     * @Serializer\Since("0.1")
     * @Serializer\VirtualProperty
     * @Serializer\SerializedName("id")
     * @return string
     */
    public function getScholarId(){
        return self::CODE.$this->id;
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
