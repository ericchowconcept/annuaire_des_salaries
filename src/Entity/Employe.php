<?php

namespace App\Entity;


use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\EmployeRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EmployeRepository::class)]
class Employe
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champs ne peut être vide")]
    #[Assert\Length(min:5,max:255, minMessage: "Pas assez de caractères . il faut au moins {{ limit }} caractères et {{ value }} est trop court")]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champs ne peut être vide")]
    #[Assert\Length(min:5,max:255, minMessage: "Pas assez de caractères . il faut au moins {{ limit }} caractères et {{ value }} est trop court")]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champs ne peut être vide")]
    #[Assert\Length(min:5,max:255, minMessage: "Pas assez de caractères . il faut au moins {{ limit }} caractères et {{ value }} est trop court")]
    private ?string $telephone = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champs ne peut être vide")]
    #[Assert\Length(min:5,max:255, minMessage: "Pas assez de caractères . il faut au moins {{ limit }} caractères et {{ value }} est trop court")]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champs ne peut être vide")]
    #[Assert\Length(min:5,max:255, minMessage: "Pas assez de caractères . il faut au moins {{ limit }} caractères et {{ value }} est trop court")]
    private ?string $adresse = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Ce champs ne peut être vide")]
    #[Assert\Length(min:5,max:255, minMessage: "Pas assez de caractères . il faut au moins {{ limit }} caractères et {{ value }} est trop court")]
    private ?string $poste = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"Ce champs ne peut être vide")]
    private ?int $salaire = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    #[Assert\NotBlank(message:"Ce champs ne peut être vide")]
    private ?\DateTimeInterface $datedenaissance = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPoste(): ?string
    {
        return $this->poste;
    }

    public function setPoste(string $poste): self
    {
        $this->poste = $poste;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->salaire;
    }

    public function setSalaire(int $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getDatedenaissance(): ?\DateTimeInterface
    {
        return $this->datedenaissance;
    }

    public function setDatedenaissance(\DateTimeInterface $datedenaissance): self
    {
        $this->datedenaissance = $datedenaissance;

        return $this;
    }

 
}
