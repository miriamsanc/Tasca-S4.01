# 🎓 PractiHub

A web platform that connects students and companies by allowing users to publish and apply for internship opportunities.

## ✨ Features

- User registration and login (Laravel Breeze)
- User profile management and deletion
- Search for offers by category or location
- Create, edit, and delete own offers
- Apply and withdraw applications from other users' offers
- Candidate management: the creator of an offer can see who has applied and accept or reject each application
- "My Activity" dashboard with published offers and submitted applications

## 🛠️ Technologies

- **Backend:** Laravel 13 + PHP 8.4
- **Authentication:** Laravel Breeze
- **Frontend:** Blade + Tailwind CSS
- **Database:** SQLite
- **Build tool:** Vite

## 🚀 Installation

```bash
# Clone the repository
git clone https://github.com/miriamsanc/Tasca-S4.01.git
cd Tasca-S4.01

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Configure environment
cp .env.example .env
php artisan key:generate

# Configure the database in the .env file
# DB_CONNECTION=sqlite

# Run migrations
php artisan migrate

# Compile assets and start the server
npm run dev
php artisan serve
```

Visit http://localhost:8000

## 📸 Preview
### Welcome page
<img width="1286" height="841" alt="image" src="https://github.com/user-attachments/assets/533f7b22-e4a0-4c8f-93a7-7433348b9ebe" />

### Dashboard
<img width="1306" height="593" alt="image" src="https://github.com/user-attachments/assets/3c397c2c-9179-446d-9df7-360bbc94ae13" />

### Search
<img width="1265" height="855" alt="image" src="https://github.com/user-attachments/assets/c55607b1-0873-4f1e-8bfe-5b3ca3a494cd" />

### Create offer
<img width="1240" height="942" alt="image" src="https://github.com/user-attachments/assets/3f505ee4-36df-498b-b74a-8a9dd39f2a92" />

### My offers
<img width="1292" height="698" alt="image" src="https://github.com/user-attachments/assets/074533ea-c04e-494b-80c6-d81c11590079" />





