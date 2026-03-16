# 🍽️ YourMenu - Backend Engine (Multi-Tenant)

O **YourMenu** é uma plataforma de gestão para restaurantes construída com foco em escalabilidade. O sistema opera em um modelo multi-inquilino (multi-tenant), onde uma interface administrativa central gerencia múltiplos restaurantes, cada um com sua própria identidade visual, regras de negócio e fluxo de pedidos.

---

## 🛠️ Stack Técnica & Arquitetura

O projeto foi desenvolvido priorizando a separação de responsabilidades e a performance do banco de dados:

* **Linguagem & Framework:** PHP 8.x + Laravel
* **Banco de Dados:** MySQL
* **Padrões de Projeto (Design Patterns):**
    * **Repository Pattern:** Abstração da camada de persistência para um código mais limpo e testável.
    * **Service Layer:** Centralização das regras de negócio complexas (ex: lógica de disponibilidade de mesas).
* **Otimização:** Uso extensivo de **Eager Loading** para mitigar o problema de performance *N+1* em consultas relacionadas.
* **Persistência Temporária:** Sistema de carrinho e contexto do cliente baseado em **Sessions**, eliminando a fricção de login para o usuário final.

---

## ⚙️ Core Backend Logic

### 1. Arquitetura de Middlewares (Acesso e Contexto)
O backend utiliza três camadas principais de Middlewares para orquestrar a aplicação:

* **Role-Based Redirect:** Filtra o login e redireciona dinamicamente: administradores da *YourMenu* seguem para o Painel Admin, enquanto proprietários de restaurantes são levados ao seu respectivo Dashboard.
* **Tenant Context Discovery:** Ao acessar a URL de um restaurante, este middleware captura o `slug`, identifica o `restaurant_id` e injeta em sessão os dados críticos (nome, cores primária/secundária). Isso garante que toda a experiência do cliente e o processamento do pedido sejam vinculados ao banco de dados correto de forma isolada.

### 2. Engine de Reservas Inteligentes
Diferente de uma reserva simples, a lógica implementada realiza uma validação de disponibilidade em tempo real:
1.  O sistema recebe `Data`, `Horário` e `Qtd. de Pessoas`.
2.  O **Service** executa uma query que cruza a capacidade das mesas com as reservas já existentes no banco.
3.  Apenas mesas que não possuem conflitos de horário e que comportam o grupo são retornadas, evitando *overbooking*.

### 3. Gestão de Estado (Pedidos e Comandas)
O backend gerencia o ciclo de vida completo de uma venda:
* **Carrinho Stateless:** Produtos são armazenados em sessão, permitindo que o cliente feche o pedido de forma anônima.
* **Status de Comanda:** Implementação de lógica para monitorar se a comanda foi solicitada pela mesa, está pendente ou paga, com atualização direta no painel do restaurante.

---

## 🗺️ Estrutura de Domínios

* **Painel Admin (SaaS):** Gestão de Tenants (Criação e monitoramento de restaurantes).
* **Painel do Restaurante (ERP):** CRUD de produtos, gestão de mesas, customização de UI (cores) e monitoramento de pedidos.
* **Interface do Cliente (Front-end Dinâmico):** Consome os dados injetados pelo Middleware de Contexto para renderizar o cardápio e processar reservas.

---

**Desenvolvido por Arthur Berrios**
