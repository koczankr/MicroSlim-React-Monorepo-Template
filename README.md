# MicroSlim-React-Monorepo-Template

MicroSlim egy teljesen moduláris, monorepo alapú backend és frontend fejlesztési sablon **Slim PHP** backenddel és **React mikrofrontend** architektúrával.

## 📌 Főbb jellemzők
- **Slim PHP backend** – API Gateway + moduláris microservice-ek (publikus és privát)
- **React mikrofrontendek** – Egy közös shell alkalmazással
- **Monorepo struktúra** – Backend és frontend egy helyen
- **MariaDB adatbázis** – 10.11.11 verzió + PHPMyAdmin támogatás
- **Docker Compose alapú fejlesztés** – Egy paranccsal indítható

## 📂 Mappastruktúra
```
/microslim
    /backend
        /api-gateway      # API Gateway (Slim PHP)
        /common-library   # Közös függőségek (Auth, Logger, Database)
        /services
            /public-service    # Publikus API modul
            /private-service   # Privát API modul
    /frontend
        /shell-app        # Központi React shell alkalmazás
        /microfrontends
            /public-ui    # Publikus React mikrofrontend
    /config               # Konfigurációs fájlok (.env, docker-compose)
    /infra                # Deployment fájlok (Docker, Kubernetes, Terraform)
    /docs                 # Dokumentáció
```

## 🚀 Telepítés és futtatás
### 1️⃣ Klónozd a repót
```sh
git clone https://github.com/your-username/MicroSlim-React-Monorepo-Template.git
cd MicroSlim-React-Monorepo-Template
```

### 2️⃣ Indítsd el a teljes stack-et Docker Compose-szal
```sh
docker-compose up --build
```
Ez elindítja:
- **API Gateway (8000)**
- **Public Service (8001)**
- **Private Service (8002)**
- **MariaDB adatbázis (3306)**
- **PHPMyAdmin (8080)**

### 3️⃣ Frontend fejlesztési környezet indítása
A shell alkalmazás és mikrofrontend fejlesztési módban indítása:
```sh
cd frontend/shell-app && npm start
```
A **Public UI mikrofrontend indítása**:
```sh
cd frontend/microfrontends/public-ui && npm start
```

## 🛠 Fejlesztési eszközök
- **Slim PHP** – Gyors és egyszerű backend framework
- **React + TypeScript** – Modern frontend fejlesztés
- **Docker Compose** – Egyszerű fejlesztői környezet
- **MariaDB 10.11.11** – Adatbázis
- **PHPMyAdmin** – Könnyű adatbáziskezelés

## 📜 Licenc
MIT License

Készítette: Kóczán Krisztián
