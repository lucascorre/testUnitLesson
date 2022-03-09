# testUnitLesson# testUnitLesson

Dans le dossiers Front :

Faire :

- npm i
- npm run test

Pour le back : 

- cd back 
- Ouvrir Docker Desktop à côté 
- docker compose up 
- docker-compose exec app bash
- composer install 

- Vous pouvez ouvrir le projet sur : http://localhost:8000/

Lancer les tests sur le terminal : 

- php bin/phpunit 

Lancer les tests + coverage HTML :

- XDEBUG_MODE=coverage ./vendor/bin/phpunit  --coverage-html=out/

Aller ensuite sur cette page : http://localhost:5500/Back/out/

Pour voir le coverage. 

Coverage total : 89.89% 

Pour CI/CD voir symfony.yml dans le workflows Git. 

