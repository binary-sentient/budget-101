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
 * Default Categories for grouping of budget items
 *
 * @ApiResource
 * @ORM\Entity
 */
class Category
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
     * @var \DateTimeInterface When the category was created
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    private $createdOn = '';

    /**
     * @var string user-defined category name
     *
     * @ORM\Column(length=128)
     * @Assert\NotBlank
     */
    protected $name = '';

    /**
     * @var \DateTimeInterface When user archived the category
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $archivedOn = null;

    /**
     * @var User The user who created the category
     * Many categories belong to one user
     * TODO: make sure ownership is correctly set. Category should be setting the user id
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="categories")
     */
    protected $user;

    /**
     * @var Transaction[] Transactions attached to this category
     * One category has many transactions
     * TODO: Make sure ownership is correctly set. Category should be able to set transaction ids, and transactions
     * should be able to set the category id
     *
     * @ORM\OneToMany(targetEntity="Transaction", mappedBy="category")
     */
    protected $transactions;

    /**
     * Category constructor.
     */
    public function __construct()
    {
        $this->createdOn = new DateTime('NOW');
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
     * Getter for createdOn property
     * @return \DateTimeInterface
     */
    public function getCreatedOn(): \DateTimeInterface
    {
        return $this->createdOn;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getArchivedOn(): ?\DateTimeInterface
    {
        return $this->archivedOn;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return Transaction[]
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param \DateTimeInterface $archivedOn
     */
    public function setArchivedOn(\DateTimeInterface $archivedOn): void
    {
        $this->archivedOn = $archivedOn;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @param Transaction[] $transactions
     */
    public function setTransactions(array $transactions): void
    {
        $this->transactions = $transactions;
    }
}
