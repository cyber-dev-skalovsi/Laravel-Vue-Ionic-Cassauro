# Cassauro Modul

A full-stack modular application built with **Ionic + Vue** (frontend) and **Laravel 13** (backend), containerized with Docker via Laravel Sail.

---

## 📁 Project Structure

```
/cassauro-modul
  /my-app        → Ionic + Vue frontend
  /backend       → Laravel 13 + Sail (Docker) backend
```

---

## ⚙️ Requirements

- [Node.js](https://nodejs.org/) (LTS)
- [Ionic CLI](https://ionicframework.com/docs/cli) — `npm install -g @ionic/cli`
- [PHP 8.3+](https://www.php.net/)
- [Composer](https://getcomposer.org/)
- [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- WSL2 (Windows users) with Docker WSL Integration enabled

---

## 🚀 Getting Started

### 1. Clone the Repository

```bash
git clone https://github.com/your-username/cassauro-modul.git
cd cassauro-modul
```

---

### 2. Backend Setup (Laravel + Docker)

```bash
cd backend

# Install PHP dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

> **Windows users:** Run all `./vendor/bin/sail` commands from a **WSL2 terminal**.

```bash
# Start Docker containers
./vendor/bin/sail up -d

# Run database migrations
./vendor/bin/sail artisan migrate

# (Optional) Seed the database
./vendor/bin/sail artisan db:seed
```

Backend runs at: `http://localhost`

---

### 3. Frontend Setup (Ionic + Vue)

```bash
cd my-app

# Install dependencies
npm install

# Start development server
ionic serve
```

Frontend runs at: `http://localhost:8100`

---

## 🛠️ Daily Development Commands

### Backend

| Task | Command |
|---|---|
| Start containers | `./vendor/bin/sail up -d` |
| Stop containers | `./vendor/bin/sail down` |
| Run migrations | `./vendor/bin/sail artisan migrate` |
| Open shell in container | `./vendor/bin/sail shell` |
| Run tests | `./vendor/bin/sail artisan test` |

### Frontend

| Task | Command |
|---|---|
| Start dev server | `ionic serve` |
| Build for production | `ionic build` |
| Sync Capacitor | `npx cap sync` |
| Open Android Studio | `npx cap open android` |
| Open Xcode | `npx cap open ios` |

---

## 🌐 Environment Variables

Copy `.env.example` to `.env` in the `backend` folder and configure:

```env
APP_NAME=CassauroModul
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=cassauro
DB_USERNAME=sail
DB_PASSWORD=password

WWWUSER=1000
WWWGROUP=1000
```

In `my-app`, create a `.env` file:

```env
VITE_API_URL=http://localhost
```

---

## 📄 License

MIT
