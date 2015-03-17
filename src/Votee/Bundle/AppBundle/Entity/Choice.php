<?php

namespace Votee\Bundle\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Choice
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Votee\Bundle\AppBundle\Entity\Repository\ChoiceRepository")
 */
class Choice
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
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var Board
     *
     * @ORM\ManyToOne(targetEntity="Board", inversedBy="choices")
     * @ORM\JoinColumn(name="board_id", referencedColumnName="id", nullable=false)
     */
    private $board;

    /**
     * @var Vote[]
     *
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="choice", cascade={"all"})
     */
    private $votes;


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
     * Set name
     *
     * @param string $name
     * @return Choice
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
     * Set note
     *
     * @param string $note
     * @return Choice
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
     * @param Board $board
     */
    public function setBoard($board)
    {
        $this->board = $board;
    }

    /**
     * @return Board
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * @param Vote[] $votes
     */
    public function setVotes($votes)
    {
        $this->votes = $votes;
    }

    /**
     * @return Vote[]
     */
    public function getVotes()
    {
        return $this->votes;
    }
}
