<h1>TASK</h1>

I. Sectiune admin (pe ruta „/dashboard”)

- va fi accesibila doar utilizatorilor cu rol „admin”

- sistem de login cu adresa de email si parola

- sistem de preventie atacuri de tip „brute force” – la 5 incercari nereusite de login, utilizatorul va fi blocat pentru 5 minute

- sistem de management categorii (CRUD – adaugare/editare/stergere/vizualizare)

                - coloane: nume, data adaugare

- sistem de management postari (CRUD – adaugare/editare/stergere/vizualizare)

                - coloane: titlu, descriere (editor WYSIWIG – de ex: CKeditor, TinyMCE), imagine, autor, data adaugare, status (draft/publicata)

- toate formularele vor avea validari pe front (cu jQuery validate) si pe backend (folosind validarile din Laravel)

 

II. Sectiune utilizatori publici

- pe homepage se va afisa lista de categorii si cele mai recente 6 articole (indiferent de categorie)

- la click pe titlu categorii vei fi dus pe pagina acelei categorii, unde se vor afisa toate articolele publicate din acea categorie (cu paginare, maxim 3 articole pe pagina)

- la click pe titlu articol vei fi dus pe pagina acelui articol, unde se va afisa descrierea completa a articolului

 

OBSERVATII:

- pentru realizarea sectiunii publice poti sa folosesti orice librarie de CSS doresti (de ex: Bootstrap, Tailwind)

- pentru realizarea sectiunii admin poti sa folosesti o tema de admin gratuita (de ex: AdminLTE - https://adminlte.io/)
