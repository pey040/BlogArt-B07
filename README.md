Sculp'eaux

## Fonctionnalités

=> connection (membre et admin), inscription, et acceptation des cookies
=> visualisation des articles et des commentaires

(toute ces features sont implémentées et valides)
## Panel Admin

Accessible depuis : index1.php ou http://147.210.174.60/etu-mmi-07/index.php

## Panel front

Accessible depuis : allfront/accueil.php ou http://147.210.174.60/etu-mmi-07/allfront/accueil.php

**Identifiant localhost**

> super-admin :
> email : user@email.com
> pass : user
> mdp : user

> membre :
> email : membre@mail.com
> pass : Membre
> mdp : Membre

### Structure et règles de la Base de données

La base de données fournie :
Angle, Article, Commentaire, Langue, Membre, Statut et Thématique (La base utilise aussi User, mais son CRUD n'est pas inclus



### Pour les Membres

> Lors de la création d'un Membre via le CRUD, si le statut est celui de super admin, le membre sera aussi créer sur la base de données user, afin de pouvoir se connecter en tant qu'administateur

