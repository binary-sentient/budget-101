<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
//use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * A user of Budget101
 *
 * @ApiResource
 * @ORM\Entity
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @var int The entity Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \DateTimeInterface The date the user signed up
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    private $createdOn = '';

    /**
     * @var string username
     *
     * @ORM\Column(type="string", length=64, unique=true)
     * @Assert\NotBlank
     */
    protected $username = '';

    /**
     * @var string user first name
     *
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank
     */
    protected $firstName = '';

    /**
     * @var string user last name
     *
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank
     */
    protected $lastName = '';

    /**
     * @var string password
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    protected $password = '';

    /**
     * @var \DateTimeInterface The date the user closed his account
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $deletedOn = null;

    /**
     * @var \DateTimeInterface The timestamp of the user's last session
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    protected $lastSessionOn = '';

    /**
     * @var Category[] Categories this user has created.
     * TODO: make sure ownership is correctly set. User should not be setting categories, Rather the categories
     * should be setting the user id
     *
     * @ORM\OneToMany(targetEntity="Category", mappedBy="user")
     */
    protected $categories;

    /**
     * @var Tag[] Tags this user has created.
     * TODO: make sure ownership is correctly set. User should not be setting tag ids, tags should be setting user id
     *
     * @ORM\OneToMany(targetEntity="Tag", mappedBy="user")
     */
    protected $tags;

    /**
     * @var Transaction[] Transactions this user has created.
     * TODO: make sure ownership is correctly set. User should not be setting transaction ids. transaction should be
     * setting user id
     *
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="user")
     */
    protected $transactions;

    public function __construct() {
        $this->createdOn = new DateTime('NOW');
        $this->tags = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->transactions = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return \DateTimeInterface
     */
    public function  getCreatedOn(): \DateTimeInterface
    {
        return $this->createdOn;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDeletedOn(): ?\DateTimeInterface
    {
        return $this->deletedOn;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getLastSessionOn(): \DateTimeInterface
    {
        return $this->lastSessionOn;
    }

    /**
     * @return Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    /**
     * @return Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * @return Transaction[]
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @param \DateTimeInterface $deletedOn
     */
    public function setDeletedOn(\DateTimeInterface $deletedOn): void
    {
        $this->deletedOn = $deletedOn;
    }

    /**
     * TODO: This should be set when the user logs in
     * @param \DateTimeInterface $lastSessionOn
     */
    public function setLastSessionOn(\DateTimeInterface $lastSessionOn): void
    {
        $this->lastSessionOn = $lastSessionOn;
    }

    /**
     * @param Category[] $categories
     */
//    public function setCategories(array $categories): void
//    {
//        $this->categories = $categories;
//    }

    /**
     * @param Tag[] $tags
     */
//    public function setTags(array $tags): void
//    {
//        $this->tags = $tags;
//    }

    /**
     * @param Transaction[] $transactions
     */
//    public function setTransactions(array $transactions): void
//    {
//        $this->transactions = $transactions;
//    }

    /**
     * TODO: implement hashing
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}
