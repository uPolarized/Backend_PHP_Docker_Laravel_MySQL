Projeto Laravel com Docker configurado, PHP 8.2 e MySQL.

Passos:
1) alterar o .env.example (dentro de app src) para .env
2) docker compose up --build
3) acessar http://localhost:8080

obs: não é necessario rodar manualmente as migrações, o arquivo wait-for-mysql.sh faz automaticamente quando o container sobe.
