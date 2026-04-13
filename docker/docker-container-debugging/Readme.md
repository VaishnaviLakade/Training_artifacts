# Debugging Docker Containers

## Commands Practiced

```bash
docker build -t docker-debug-app .
docker run -d -p 3000:3000 --name debug-container docker-debug-app
docker ps
docker logs debug-container
docker exec -it debug-container sh
docker inspect debug-container
docker compose up --build -d
docker compose logs
```
