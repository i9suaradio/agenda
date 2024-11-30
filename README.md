# Agenda Adri Pet Center
## Sistema para fazer agendamentos de Banho o Tosa

- Desenvolvedor: Guilherme Pinheiro
- www.guilhermepinheiro.com.br

## Apresentação

O sistema **Agenda** é uma aplicação CRM desenvolvida para gerenciar os agendamentos de serviços de banho e tosa em uma clínica veterinária/banho e tosa. Este sistema organiza informações de clientes, pets, agendamentos e serviços adicionais, facilitando o controle do negócio e a eficiência operacional.

O sistema foi projetado para atender as necessidades de uma clínica de banho e tosa, permitindo que os administradores, funcionários e motoristas de táxi dog realizem suas atividades com precisão e praticidade.

---

## Tecnologias Utilizadas

- **Backend:** Laravel 11 (PHP)
- **Frontend:** HTML, CSS, Bootstrap 5
- **Banco de Dados:** MySQL
- **Arquitetura:** Padrão MVC

---

## Funcionalidades Principais

### 1. Gerenciamento de Clientes
- Cadastro de clientes com dados pessoais, dia preferido para banho e ordem do táxi dog.
- Listagem de clientes ordenada alfabeticamente.
- Edição e exclusão de clientes.
- Visualização detalhada dos dados de cada cliente.
- Acesso a vida financeira do cliente, débitos e gastos

---

### 2. Gerenciamento de Pets
- Cadastro de pets vinculados a clientes.
- Edição e exclusão de registros de pets.
- Registro de informações como raça, valor do pacote, frequência e uso do táxi dog.

---

### 3. Gerenciamento de Agendamentos
- Criação de agendamentos de banho ou tosa, com exibição no calendário.
- Atualização de status do agendamento (Agendado, Executado, Pago, Cancelado, Arquivado).
- Visualização de agendamentos por dia ou mês.
- Edição e Exclusão de agendamentos.

---

### 4. Gerenciamento de Itens
- Registro de itens adicionais ou serviços extras realizados no dia do agendamento.
- Vinculação de itens a agendamentos, pets e clientes.
- Controle de valores pagos e pendentes.
- Edição e Exclusão de itens registrados.

---

### 5. Gestão de Táxi Dog
- Geração de lista de clientes para coleta diária.
- Permitir reordenação manual do itinerário com salvamento.
- Impressão da lista de coleta para o motorista.

---

## Estrutura do Projeto

### Entidades Principais
- **Clientes**: Armazena informações pessoais e preferências de cada cliente.
- **Pets**: Registra dados de animais associados aos clientes.
- **Agenda**: Controla os agendamentos de serviços.
- **Itens**: Gerencia serviços adicionais ou produtos adquiridos.
- **Usuários**: Gerencia o acesso e os níveis de permissão no sistema.

---

## Funcionalidades Futuras Possíveis
- Integração com APIs para envio de notificações aos clientes.
- Suporte a múltiplas unidades da clínica.

---

## Licença
Este projeto é de uso exclusivo da **Adri Pet Center** e foi desenvolvido para atender suas necessidades operacionais.