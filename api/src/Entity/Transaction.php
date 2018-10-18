<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Default Categories for grouping of budget items
 *
 * @ApiResource
 * @ORM\Entity
 * @ORM\Table(name="`transaction`")
 */
class Transaction
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
     * @var \DateTimeInterface When the transaction was added/imported
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    private $createdOn = '';

    /**
     * @var string Transaction description
     *
     * @ORM\Column(length=255)
     * @Assert\NotBlank
     */
    protected $description = '';

    /**
     * @var string|null Optional transaction notes
     *
     * @ORM\Column(length=255, nullable=true)
     */
    protected $note = '';

    /**
     * @var string The amount of the transaction in fractional dollars (2 decimal precision)
     *
     * @ORM\Column(type="decimal", scale=2)
     */
    protected $amount = 0.00;

    /**
     * @var \DateTimeInterface When the transaction took place.
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    protected $transactedOn = '';

    /**
     * @var \DateTimeInterface|null When the transaction was deleted
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $deletedOn = null;

    /**
     * @var User The user to whom the transaction belongs
     * Many transactions for each user
     *
     * TODO: Verify ownership. Transaction should be able to set User.id, but User should not be able to set Transaction.Id
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="transactions")
     */
    protected $user;

    /**
     * @var Category The category to whom the transaction belongs
     * Many transactions for each category
     *
     * TODO: Verify ownership: Transaction should be able to set Category.id, but Category should not be abel to set
     * Transaction.Id
     *
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="transactions")
     */
    protected $category;

    /**
     * @var Tag[] Tags attached to this transaction
     * One transaction has many tags
     *
     * TODO: Verify ownership: Transaction should be able to set Tag.ids, but Tag should not be able to set
     * Transaction.Id
     *
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="transactions")
     */
    protected $tags;

    /**
     * Transaction constructor.
     */
    public function __construct()
    {
        $this->createdOn = new DateTime('NOW');
        $this->tags = new ArrayCollection();
    }

    /**
     * Getter for the Id property
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
     * Getter for the description property
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Getter for note property
     * @return string|null
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * Getter for amount property
     * @return string
     */
    public function getAmount(): string
    {
        return $this->amount;
    }

    /**
     * Getter for transactedOn property
     * @return \DateTimeInterface
     */
    public function getTransactedOn(): \DateTimeInterface
    {
        return $this->transactedOn;
    }

    /**
     * Getter for deletedOn property
     * @return \DateTimeInterface|null
     */
    public function getDeletedOn(): ?\DateTimeInterface
    {
        return $this->deletedOn;
    }

    /**
     * Getter for user property
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * Getter for category property
     * @return Category|null
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * Getter for tags property
     * @return Collection
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * Setter for the description property
     *
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * Setter for the note property
     *
     * @param null|string $note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * @param string $amount
     */
    public function setAmount(string $amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @param \DateTimeInterface $transactedOn
     */
    public function setTransactedOn(\DateTimeInterface $transactedOn): void
    {
        $this->transactedOn = $transactedOn;
    }

    /**
     * @param \DateTimeInterface|null $deletedOn
     */
    public function setDeletedOn(?\DateTimeInterface $deletedOn): void
    {
        $this->deletedOn = $deletedOn;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }

    /**
     * @param Tag[] $tags
     */
    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }
}
