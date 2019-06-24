# Aplicação de pedido

Utilizei o docker para o banco de dados MySql.

Ao iniciar, execute o comando:

```
sudo docker-compose -f database.yml up
```

para inicializar o banco de dados.

Em seguida, execute o comando:

```
php artisan serve
```

para inicializar o servidor local.

Acesse a rota `/products` para ter acesso ao CRUD de produtos.

Acesse a rota `/orders` para ter acesso ao CRUD de pedidos.
