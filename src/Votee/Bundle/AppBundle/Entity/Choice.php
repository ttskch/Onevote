<?php

namespace Votee\Bundle\AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Choice
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Votee\Bundle\AppBundle\Entity\Repository\ChoiceRepository")
 */
class Choice
{
    use Timestampable;

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
     * @var Board
     *
     * @ORM\ManyToOne(targetEntity="Board", inversedBy="choices")
     * @ORM\JoinColumn(name="board_id", referencedColumnName="id", nullable=false)
     */
    private $board;

    /**
     * @var Vote[]|Collection
     *
     * @ORM\OneToMany(targetEntity="Vote", mappedBy="choice", cascade={"all"})
     */
    private $votes;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->votes = new ArrayCollection();
    }

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
     * Set board
     *
     * @param Board $board
     * @return Choice
     */
    public function setBoard(Board $board)
    {
        $this->board = $board;

        return $this;
    }

    /**
     * Get board
     *
     * @return Board
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * Add votes
     *
     * @param Vote $votes
     * @return Choice
     */
    public function addVote(Vote $vote)
    {
        $this->votes[] = $vote;

        return $this;
    }

    /**
     * Remove votes
     *
     * @param Vote $vote
     */
    public function removeVote(Vote $vote)
    {
        $this->votes->removeElement($vote);
    }

    /**
     * Get votes
     *
     * @return Collection
     */
    public function getVotes()
    {
        return $this->votes;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }
}
