# Dent Care App

Simple application to schedule health care appoinments and handle users

# Set up

```bash
cp .env.example .env

cp docker-compose.override.yml.dist docker-compose.override.yml

docker compose up -d --build

echo '127.0.0.1    app.dent-care.localhost database.dent-care.localhost'
```
