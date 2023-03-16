<?php
class DAO
{
    public function __construct()
    {
    }

    //il faut changer le host, le username 'route' et le password '' selont votre serveur de base de données
    public function connexion()
    {
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=bdd_el_aine', 'root', '');
        return $pdo;
    }

    //fonction pour la création d'utilisateur
    public function registerUser($first_name, $last_name, $email, $password, $age)
    {
        $bdd = $this->connexion();
        $reponse = $bdd->prepare("INSERT into user(first_name, last_name, email, password, age) values(?,?,?,?,?)");
        $reponse->execute([$first_name, $last_name, $email, $password, $age]);
        if ($reponse->fetch()) return true;
        else return false;
    }

    //fonction de connexion de l'utilisateur
    public function authentificationUser($email, $password)
    {
        $bdd = $this->connexion();
        $reponse = $bdd->prepare("SELECT * from user where email= ? and password = ?");
        $reponse->execute([$email, $password]);
        $lst = [];
        while ($ligne = $reponse->fetch()) {
            $lst[] = [$ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5]];
        }
        $reponse->closeCursor();
        return $lst;
    }

    //fonction qui retourne la liste des utilisateurs
    public function listUsers()
    {
        $bdd = $this->connexion();
        $reponse = $bdd->prepare("SELECT * from user");
        $reponse->execute([]);
        $lst = [];
        while ($ligne = $reponse->fetch()) {
            $lst[] = [$ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5]];
        }
        $reponse->closeCursor();
        return $lst;
    }

    //fonction qui retourne la informations d'un utilisateur par son id
    public function getUserInformations($userId)
    {
        $bdd = $this->connexion();
        $reponse = $bdd->prepare("SELECT * from user where id =?");
        $reponse->execute([$userId]);
        $lst = [];
        while ($ligne = $reponse->fetch()) {
            $lst[] = [$ligne[0], $ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[5]];
        }
        $reponse->closeCursor();
        return $lst;
    }

    //fonction pour la création d'utilisateur
    public function updateUser($first_name, $last_name, $email, $password, $age, $userId)
    {
        $bdd = $this->connexion();
        $reponse = $bdd->prepare("UPDATE user SET first_name=?, last_name=?, email=?, password=?, age=? WHERE id=?");
        $reponse->execute([$first_name, $last_name, $email, $password, $age, $userId]);
        if ($reponse->fetch()) return true;
        else return false;
    }

    //fonction qui retourne la liste des utilisateurs
    public function deleteUser($id)
    {
        $bdd = $this->connexion();
        $reponse = $bdd->prepare("DELETE from user where id =?");
        $reponse->execute([$id]);
        if ($reponse->fetch()) return true;
        else return false;
    }
}
