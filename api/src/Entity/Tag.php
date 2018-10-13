<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Tests\Fixtures\TestBundle\Doctrine\Generator\Uuid;
use Doctrine\ORM\Mapping as ORM;
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
     * @var UUID The entity Id
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
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
     * @var \DateTimeInterface The publication date
     *
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     */
    public $createdOn = '';

    /**
     * @var \DateTimeInterface The publication date
     *
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\NotBlank
     */
    public $archivedOn = '';

    /**
     * @var User The user who created the tag
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tags")
     */
    public $user;

    public function getId(): Uuid
    {
        return $this->id;
    }
}
