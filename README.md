# Coding-Challenge
Retornar o ranking de um determinado movimento, trazendo o nome do movimento e uma lista ordenada com os usuários, seu respectivo recorde pessoal (maior valor), posição e data.

# Tabela de conteudos
<!--ts-->
   * [Coding-Challenge](#coding-challenge)
   * [Tabela de Conteudo](#tabela-de-conteudos)
   * [Instalação](#instalação)
   * [Como usar](#como-usar)
   * [Testes](#testes)
   * [Tecnologias utilizadas](#tecnologias-utilizadas)
<!--te-->

# Instalação
- Clone este projeto `git clone https://github.com/henriquepappis/coding-challenge.git`
- Acesse via terminal a pasta docker e rode o seguinte comando:
`docker-compose --env-file ../.env up --build -d`
# Como usar
 - Importe a collection para o postman `https://www.getpostman.com/collections/e83ff8fe24caf6caa333`
# Testes
- Para rodar os testes abra o terminal, acesse o container challenge-app `docker exec -it challenge_app sh` e rode o comando `composer test`.
## Tecnologias utilizadas
- Docker
- PHP 7.3
- MySQL 8.0
- Lumen Framework
- PHPUnit
- Eloquent ORM
