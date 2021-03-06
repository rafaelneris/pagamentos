## Sistema de pagamentos

#### Documentação
[Clique aqui](api.md)

#### Dependências
 * Docker

#### Configuração e execução
1. Clone o projeto
2. cd .docker
3. Execute: `docker-compose up -d`
4. Configure o .env
5. `php artisan migrate`
5. Seu projeto estará pronto para ser executado! (:

### Conceitos utilizados no projeto:
* Design Patterns (Factory, Factory Method)
* Repository Pattern
* SOLID
* ValueObjects

### Scripts
*Code Style:*
* PSR-12: `composer cs-psr12-check`

*Code Quality* 
* MassDetector: `composer codequality`
* Larastan: `composer codequality-stan`


#### Propostas de melhorias
* Criar abstração para Mappers (A idéia seria utilizar o Laminas Hydrator para tal.)
* Utilização de filas para processamento das requisições de transação.
* Trabalhar nos valores de moeda (Talvez, implementar ValueObjects)
* Finalizar cobertura de testes :(
