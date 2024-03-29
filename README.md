## **Update 2024** => le site n'est plus en ligne

2022 : désactivation de ReCaptcha => non RGPD friendly 

# Mon portofolio
## Plan du site 
Le menu :
- Portofolio : pour présenter mes sites
- Exercices : CSS Battle etc
- CV : Mon cv (téléchargeable)
- Blog : articles sur mon ressenti de dévéloppeur Junior
- page de contact avec un formulaire

## Architecture 
Le projet sera en MVC => Modèle-Vue-Contrôleur
Dans le code : 
- Model => src => Entity
  - avec getter setter 
- Vue => templates
- Controlleur => src/ Controller
    - Avec du CRUD pour chaque controller
      - Create/Read/Update/Delete
    - Le MainController va gérer les routes
    - Le SecurityController va gérer le login mais juste pour moi, pour ajouter mes nouveaux articles sans pousser de code
- Les Repository
  - C'est ici que l'ont va récupèrer les données avec du SQL, par exemple recupérer mes articles, mes exercices etc
 
    
## Les technologies 
- HTML
- projet Symfony, framework avec programmation orientée objet
- Design en CSS
- Base de données (mySQL, PhpMyadmin) 
