<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Tests\Fixtures\TestBundle\Doctrine\Generator\Uuid;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * A user of Budget101
 *
 * @ApiResource
 * @ORM\Entity
 */
class User
{
    /**
     * @var UUID The entity Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * @var string username
     *
     * @ORM\Column(type="string", length=64)
     * @Assert\NotBlank
     */
    public $userName = '';

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
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    public $deletedOn = '';

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

    public function getId(): Uuid
    {
        return $this->id;
    }
}
