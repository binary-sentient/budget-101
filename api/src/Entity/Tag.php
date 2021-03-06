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
 * Custom tags for further categorization of budget items
 *
 * @ApiResource
 * @ORM\Entity
 */
class Tag
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
     * @var \DateTimeInterface When the tag was created
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    public $createdOn = '';

    /**
     * @var string user-defined tag name
     *
     * @ORM\Column(length=128)
     * @Assert\NotBlank
     */
    protected $name = '';

    /**
     * @var \DateTimeInterface When user archived the tag
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $archivedOn = null;

    /**
     * @var User The user who created the tag
     * TODO: Verify ownership: Tag sets User.id, but User does not set Tag ids
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tags")
     */
    protected $user;

    /**
     * @var Tag The tag to whom many transaction belongs
     * Many tags for each transaction.
     *
     * TODO: Verify ownership: Tag should be able to set Transaction.Ids, and Transaction should be able to set a Tag.id
     *
     * @ORM\ManyToMany(targetEntity="Transaction", mappedBy="tags")
     */
    protected $transactions;

    /**
     * Tag constructor.
     */
    public function __construct()
    {
        $this->createdOn = new DateTime('NOW');
        $this->transactions = new ArrayCollection();
    }

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
     * @return Collection
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


}
