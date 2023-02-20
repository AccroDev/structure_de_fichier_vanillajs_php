# structure_de_fichier_vanillajs_php
ce projet est une structure de fichier adaptée pour des projets PHP avec du vanillajs c'est a dire sans framework. Il génère des pages html mais a aussi la partie API qui peut génère des json ou des morceaux de html. Il utilise altorouter pour gérer les routes (url)


le routeur prend en parametre le chemin depuis index.php vers le quel il va trouver les differentes templates ou pages qu'il va generer maintenant en fonctionde l'url

```php
// on cree le router dans index.php
$router = new Router('Views/template');

/* on lui passe le route 
    * get() pour les routes en get avec comme parametre 'route','template_or_page_a_charger','nom_de_la_route'
    *post() pour les routes en post avec les memes parametre qu'en get
*/ 

    $router->get('/','/HomePage','HomePage')
        ->get('','/HomePage')
        ->get('/cours','/cours','listCours')
        ->run();
```
NB : ce router prend les templates ou page a charger dans le dossierque vous lui avait passer en parametre.
par exemple pour cette route ''->get('/','/HomePage','HomePage')'' quand l'url sera '/' ça va charger la page 'HomePage.php' situé dans le dossier 'Views/template' qui a été passer en parametre du router quand on a instancier cette class

Mais nous avons le router pour les apis

```php 

$routerApi = new RouterApi('Controllers');
      $routerApi  ->post('/api/test','Test','test')
                  ->get('/api/test','Test@get','test')
                  ->run();

```
Il lit ce router que si la route commence par 'api', par exemple 'mysite.com/api/getUser', 
mais vous pouvez changer la condition. ce router lui par contre ne charge pas les templates dans un dossier quelquonque mais plutot instancie la class passer en second paramettre. 

par exemple ce route ""->post('/api/test','Test','test')"", le router va fair un 'new Test' et cette class doit se trouver dans le dossier passer en parametre du router donc dans le dossier Controllers dans ce cas.

Mais si le second paramettre contient un @ ça veut dire que il doit executer aussi une methode en particulier, en locurence celle passer a droite du arobase.

par exemple  '->get('/api/test','Test@get','test')' cette route va instancier la class 'Test' puis executer deçut sa methode 'get()' 

## commencer

* clonner le depot 
    avec la commande 'git clone git@github.com:AccroDev/structure_de_fichier_vanillajs_php.git' dans git ou telecharger directement le zip de ce fichier
* Apres modifier quelques donnees dans composer.json comm le nom, auteur etc

## contributeur

- [AccroDev joseph](https://github.com/AccroDev)