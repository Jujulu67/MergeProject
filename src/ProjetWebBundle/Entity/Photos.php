<?php

namespace ProjetWebBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;

/**
 * @ORM\Entity
 * @ORM\Table(name="photos")
 *
 */
class Photos
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="ProjetWebBundle\Entity\Activity", inversedBy="photos", cascade={"remove"})
     * @ORM\JoinColumn(nullable=false)
     */

    private $activity;


    /**
     * @ORM\Column(type="string")
     */

    private $descriptionPhoto;



    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Please, upload the product brochure as a PDF file.")
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png" })
     */
    private $pictureFile;

    /**
     * @ORM\OneToMany(targetEntity="ProjetWebBundle\Entity\Comment", mappedBy="photo", cascade={"persist"})
     */

    private $comments;


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
     * Set activity
     *
     * @param \ProjetWebBundle\Entity\Activity $activity
     *
     * @return Photos
     */
    public function setActivity(\ProjetWebBundle\Entity\Activity $activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return \ProjetWebBundle\Entity\Activity
     */
    public function getActivity()
    {
        return $this->activity;
    }



    /**
     * Set descriptionPhoto
     *
     * @param string $descriptionPhoto
     *
     * @return Photos
     */
    public function setDescriptionPhoto($descriptionPhoto)
    {
        $this->descriptionPhoto = $descriptionPhoto;

        return $this;
    }

    /**
     * Get descriptionPhoto
     *
     * @return string
     */
    public function getDescriptionPhoto()
    {
        return $this->descriptionPhoto;
    }


    public function getPictureFile()
    {
        return $this->pictureFile;
    }

    public function setPictureFile($pictureFile)
    {
        $this->pictureFile = $pictureFile;

        return $this;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add comment
     *
     * @param \ProjetWebBundle\Entity\Comment $comment
     *
     * @return Photos
     */
    public function addComment(\ProjetWebBundle\Entity\Comment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \ProjetWebBundle\Entity\Comment $comment
     */
    public function removeComment(\ProjetWebBundle\Entity\Comment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
}
