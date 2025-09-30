# plateforme de gestion des réclamations pour les services clients des entreprises.
<p>Un client qui souhaitera faire une demande, vient sur la plateforme, se 
connecte et formule sa demande en remplissant un formulaire de demande. 
La demande ainsi formulée sera ajoutée à la plateforme avec le statut « En 
attente » et un mail sera envoyé à tous les administrateurs afin de les informer 
qu’une nouvelle demande a été soumise. Depuis le mail reçu, un lien vers la 
nouvelle demande sera disponible qui permettra aux administrateurs d’accéder 
à la page de détails de la demande. </p>
<p>Depuis la page de détails, si une demande est en attente, un administrateur 
peut cliquer sur le bouton « Traiter la demande » qui permettra d’attribuer 
automatiquement la demande à cet administrateur et mettre le statut de la 
demande à « En cours de traitement ». Il faut noter qu’une demande est 
assignée à un seul et unique administrateur.</p>
<p>L’administrateur en charge de la demande peut changer le statut de la 
demande. Le statut prend l’une des valeurs suivantes selon le niveau de 
traitement : En attente, En cours de traitement, Rejetée, Traitée. 
Si l’administrateur en charge de la demande indique que la demande est 
rejetée, un mail d’information de rejet sera envoyé au client l’informant que sa 
demande a été rejetée avec le motif du rejet précisé par l’administrateur. S’il 
indique que la demande est traitée, un mail d’information sera envoyé à 
l’utilisateur l’informant que sa demande est traitée avec succès. </p>
<p>Le système doit envoyer un mail de rappel à tous les administrateurs si une 
demande reste plus de 2 jours, 4 jours ou une semaine sans être prise par un 
administrateur. </p>
<p>Le système doit notifier l’administrateur responsable d’une demande si la 
demande reste plus de 2 jours dans le statut « En cours de traitement ». 
</p>
<p>Assistancia souhaite disposer d’un tableau de bord qui indique le nombre de 
demande traitée par chaque administrateur dans le mois en cours, le nombre 
total de demande dans les statuts suivants : En attente, En cours de traitement, 
Rejetée, Traitée. 
Pour l’administrateur qui est connecté, on aimerait également voir, depuis le 
tableau de bord : 
<ul>
 <li>Le nombre de ses demandes en attente,</li>
<li>Le nombre de ses demandes rejetées, </li>
<li>Le nombre de ses demandes traitées.</li>
</ul>

</p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

<small>Deceember 2022</small>
