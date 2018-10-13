<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @var string username
     *
     * @ORM\Column(type="string", length=64, unique=true)
     * @Assert\NotBlank
     */
    public $username = '';

    /**
     * @var string user first name
     *
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank
     */
    public $firstName = '';

    /**
     * @var string user last name
     *
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank
     */
    public $lastName = '';

    /**
     * @var string password
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    public $password = '';

    /**
     * @var \DateTimeInterface The date the user signed up
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    public $createdOn = '';

    /**
     * @var \DateTimeInterface The date the user closed his account
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    public $deletedOn = null;

    /**
     * @var \DateTimeInterface The timestamp of the user's last session
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    public $lastSessionOn = '';

    /**
     * @var Tag[] Tags this user has created.
     *
     * @ORM\OneToMany(targetEntity="Tag", mappedBy="user")
     */
    public $tags;

    public function __construct() {
        $this->tags = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
