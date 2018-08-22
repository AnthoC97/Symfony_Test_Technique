<?php

namespace SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="patient")
 * @ORM\Entity(repositoryClass="SiteBundle\Repository\PatientRepository")
 */
class Patient
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_consultation", type="date")
     */
    private $dateConsultation;

    /**
     * @var string
     *
     * @ORM\Column(name="prescription_g", type="string", length=30)
     */
    private $prescriptionG;

    /**
     * @var string
     *
     * @ORM\Column(name="prescription_d", type="string", length=30)
     */
    private $prescriptionD;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Patient
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
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Patient
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
     * Set dateConsultation
     *
     * @param \DateTime $dateConsultation
     *
     * @return Patient
     */
    public function setDateConsultation($dateConsultation)
    {
        $this->dateConsultation = $dateConsultation;

        return $this;
    }

    /**
     * Get dateConsultation
     *
     * @return \DateTime
     */
    public function getDateConsultation()
    {
        return $this->dateConsultation;
    }

    /**
     * Set prescriptionG
     *
     * @param string $prescriptionG
     *
     * @return Patient
     */
    public function setPrescriptionG($prescriptionG)
    {
        $this->prescriptionG = $prescriptionG;

        return $this;
    }

    /**
     * Get prescriptionG
     *
     * @return string
     */
    public function getPrescriptionG()
    {
        return $this->prescriptionG;
    }

    /**
     * Set prescriptionD
     *
     * @param string $prescriptionD
     *
     * @return Patient
     */
    public function setPrescriptionD($prescriptionD)
    {
        $this->prescriptionD = $prescriptionD;

        return $this;
    }

    /**
     * Get prescriptionD
     *
     * @return string
     */
    public function getPrescriptionD()
    {
        return $this->prescriptionD;
    }
}

