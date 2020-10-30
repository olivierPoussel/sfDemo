# Demo Symfony

## BDD
---
Vérifier dans le fichier .env la variable DATABASE_URL pour qu'elle corresponde à votre base de données.

### Commande pour initialiser la BDD
```
symfony console doctrine:database:create
symfony console make:migration
symfony console doctrine:migrations:migrate
symfony console doctrine:fixtures:load
```
### Commande pour créer une fixture
```
symfony console make:fixtures
```
## Création simplifiée
---
### Créer une entité
```
symfony console make:entity
```
### Créer un formulaire
```
symfony console make:form
```
### Créer un Crud
```
symfony console make:crud
```
## Serveur
---
```
symfony console server:start
symfony console server:status
symfony console server:stop
```
## Bootstrap
---
### Thèmes SF
Ligne à ajouter dans le fichier de configuration twig pour activer le thème Bootstrap 4 dans Symfony
```yaml
# fichier => config\packages\twig.yaml
twig:
    # ...
    form_themes: ['bootstrap_4_layout.html.twig']

```

Doc Symfony pour Bootstrap 4 

https://symfony.com/doc/current/form/bootstrap4.html

Comment créer un thème Symfony

https://symfony.com/doc/current/form/form_themes.html#symfony-built-in-form-themes

### Site de thèmes gratuits
https://bootswatch.com/