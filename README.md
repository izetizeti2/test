Blood Donation API

📌 Përshkrimi

Kjo është një RESTful API e ndërtuar me Laravel për menaxhimin e donacioneve të gjakut. API-ja mbështet autentifikimin me JWT, përdor seeder për të dhënat fillestare, dhe ka tabela të lidhura nëpërmjet një DB Seeder të centralizuar.

🚀 Karakteristikat

Regjistrimi dhe autentifikimi i përdoruesve me JWT.

Menaxhimi i dhurimeve të gjakut.

Listimi i dhuruesve dhe kërkuesve të gjakut.

API plotësisht funksionale me lidhje të bazës së të dhënave.

Seeder i centralizuar për të dhënat fillestare.

🛠️ Kërkesat

Sigurohu që të kesh të instaluara këto teknologji para se të fillosh:

PHP >= 8.0

Composer

MySQL ose një bazë të dhënash tjetër të mbështetur nga Laravel

Node.js & npm (opsionale, për frontend build)

Postman (opsionale, për testim API)

📥 Instalimi

1️⃣ Klonimi i projektit

git clone <repo-url>
cd blood-donation-api

2️⃣ Instalimi i varësive

composer install

3️⃣ Krijimi dhe konfigurimi i .env

Kopjo .env.example në .env dhe vendos kredencialet e bazës së të dhënave:

cp .env.example .env

Pastaj, ndrysho parametrat në .env:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blood_donation
DB_USERNAME=root
DB_PASSWORD=

4️⃣ Gjenerimi i JWT Secret Key

php artisan jwt:secret

5️⃣ Migrimi i bazës së të dhënave & Seeders

php artisan migrate --seed

6️⃣ Krijimi i storage link (opsionale, për ruajtjen e skedarëve)

php artisan storage:link

7️⃣ Pastrimi i cache dhe startimi i serverit

php artisan config:clear
php artisan cache:clear
php artisan serve

API-ja do të jetë e aksesueshme në:
👉 http://127.0.0.1:8000
