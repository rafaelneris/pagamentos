## Sistema de pagamentos

#### Dependências
 * Docker

#### Configuração e execução
1. Clone o projeto
2. cd .docker
3. Execute: `docker-compose up -d`
4. Configure o .env
5. `php artisan migrate` Para realizar a criação do banco de dados
5. Seu projeto estará pronto para ser executado! (:

#### Conceitos utilizados no projeto:
* Design Patterns (Factory, Factory Method)
* Repository Pattern
* SOLID
* ValueObjects

#### Propostas de melhorias
* Criar abstração para Mappers (A idéia seria utilizar o Laminas Hydrator para tal.)
* Utilização de filas para processamento das requisições de transação.
* Trabalhar nos valores de moeda (Talvez, implementar ValueObjects)
