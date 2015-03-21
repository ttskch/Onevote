<?php

namespace Votee\Bundle\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model\Timestampable\Timestampable;

/**
 * Vote
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Votee\Bundle\AppBundle\Entity\Repository\VoteRepository")
 */
class Vote
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
     * @ORM\Column(name="voter", type="string", length=255, nullable=true)
     */
    private $voter;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=true)
     */
    private $note;

    /**
     * @var Choice
     *
     * @ORM\ManyToOne(targetEntity="Choice", inversedBy="votes")
     * @ORM\JoinColumn(name="choice_id", referencedColumnName="id", nullable=false)
     */
    private $choice;


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
     * Set voter
     *
     * @param string $voter
     * @return Vote
     */
    public function setVoter($voter)
    {
        $this->voter = $voter;

        return $this;
    }

    /**
     * Get voter
     *
     * @return string
     */
    public function getVoter()
    {
        return $this->voter;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Vote
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
     * Set choice
     *
     * @param Choice $choice
     * @return Vote
     */
    public function setChoice(Choice $choice)
    {
        $this->choice = $choice;

        return $this;
    }

    /**
     * Get choice
     *
     * @return Choice
     */
    public function getChoice()
    {
        return $this->choice;
    }
}
