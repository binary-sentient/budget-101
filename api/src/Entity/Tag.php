<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
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
     * @var string user-defined tag name
     *
     * @ORM\Column(length=128)
     * @Assert\NotBlank
     */
    public $name = '';

    /**
     * @var \DateTimeInterface When the tag was created
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    public $createdOn = '';

    /**
     * @var \DateTimeInterface When user archived the tag
     *
     * @ORM\Column(type="datetime", nullable=true)
     */
    public $archivedOn = null;

    /**
     * @var User The user who created the tag
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tags")
     */
    public $user;

    public function getId(): ?int
    {
        return $this->id;
    }
}
