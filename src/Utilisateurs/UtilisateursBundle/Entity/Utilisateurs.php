<?php
// src/AppBundle/Entity/User.php

namespace Utilisateurs\UtilisateursBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="utilisateurs")
 */
class Utilisateurs extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $nom;

    /**
     * @ORM\Column(type="string")
     */
    protected $prenom;

    /**
     * @ORM\Column(type="integer")
     */
    protected $phonenumber;

    public function __construct()
    {
        parent::__construct();
        $this->commandes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->adresses = new \Doctrine\Common\Collections\ArrayCollection();
        // your own logic
    }

    /**
  * @ORM\OneToMany(targetEntity="Ecommerce\EcommerceBundle\Entity\Commandes", mappedBy="utilisateur", cascade={"remove"})
  * @ORM\JoinColumn(nullable=true)
  */

    private $commandes;

    /**
* @ORM\OneToMany(targetEntity="Ecommerce\EcommerceBundle\Entity\UtilisateursAdresses", mappedBy="utilisateur", cascade={"remove"})
* @ORM\JoinColumn(nullable=true)
*/

    private $adresses;


    /**
     * Add commande
     *
     * @param \Ecommerce\EcommerceBundle\Entity\Commandes $commande
     *
     * @return Utilisateurs
     */
    public function addCommande(\Ecommerce\EcommerceBundle\Entity\Commandes $commande)
    {
        $this->commandes[] = $commande;

        return $this;
    }

    /**
     * Remove commande
     *
     * @param \Ecommerce\EcommerceBundle\Entity\Commandes $commande
     */
    public function removeCommande(\Ecommerce\EcommerceBundle\Entity\Commandes $commande)
    {
        $this->commandes->removeElement($commande);
    }

    /**
     * Get commandes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommandes()
    {
        return $this->commandes;
    }

    /**
     * Add adress
     *
     * @param \Ecommerce\EcommerceBundle\Entity\UtilisateursAdresses $adress
     *
     * @return Utilisateurs
     */
    public function addAdress(\Ecommerce\EcommerceBundle\Entity\UtilisateursAdresses $adress)
    {
        $this->adresses[] = $adress;

        return $this;
    }

    /**
     * Remove adress
     *
     * @param \Ecommerce\EcommerceBundle\Entity\UtilisateursAdresses $adress
     */
    public function removeAdress(\Ecommerce\EcommerceBundle\Entity\UtilisateursAdresses $adress)
    {
        $this->adresses->removeElement($adress);
    }

    /**
     * Get adresses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdresses()
    {
        return $this->adresses;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Utilisateurs
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Utilisateurs
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set phonenumber
     *
     * @param integer $phonenumber
     *
     * @return Utilisateurs
     */
    public function setPhonenumber($phonenumber)
    {
        $this->phonenumber = $phonenumber;

        return $this;
    }

    /**
     * Get phonenumber
     *
     * @return integer
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }
}
