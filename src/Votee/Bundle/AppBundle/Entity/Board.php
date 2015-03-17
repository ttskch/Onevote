<?php

namespace Votee\Bundle\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Board
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Votee\Bundle\AppBundle\Entity\Repository\BoardRepository")
 */
class Board
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="hash", type="string", length=255)
     */
    private $hash;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var array
     *
     * @ORM\Column(name="voters", type="array", nullable=true)
     */
    private $voters;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var Choice[]
     *
     * @ORM\OneToMany(targetEntity="Choice", mappedBy="board", cascade={"all"})
     */
    private $choices;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set hash
     *
     * @param string $hash
     * @return Board
     */
    public function setHash($hash)
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * Get hash
     *
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Board
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set voters
     *
     * @param array $voters
     * @return Board
     */
    public function setVoters($voters)
    {
        $this->voters = $voters;

        return $this;
    }

    /**
     * Get voters
     *
     * @return array
     */
    public function getVoters()
    {
        return $this->voters;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Board
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param Choice[] $choices
     */
    public function setChoices($choices)
    {
        $this->choices = $choices;
    }

    /**
     * @return Choice[]
     */
    public function getChoices()
    {
        return $this->choices;
    }
}
