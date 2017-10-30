
Nail Studio
============

# Intro

Sveiki! Tai yra Nail Studio projektas.

### Projekto paleidimas

Susikuriate projekto viduje `.env` failą. Failą užpildote turiniu pateiktu iš `env.dist`.

Atkreipkite dėmęsį į `LOCAL_USER_ID` ir `LOCAL_GROUP_ID`, įvykdžius nurodytas komandas, ar sutampa `id`su jūsų nurodytais.

Toliau leidžiame komandas esančias žemiau:

```bash

docker-compose up -d
docker-compose exec fpm composer install --prefer-dist -n
docker-compose run npm npm install
docker-compose run npm gulp

```

### Kaip pamatyti kas atsitiko?

Atsidarote naršyklę ir einate į `http://127.0.0.1:8000`
 

