# DesmataMenos

O DesmataMenos é um sistema para acompanhar dados sobre queimadas no Brasil. Ele provê uma API para consultar esses dados, bem como um front-end para visualização.

## Funcionalidades

- Consulta de dados de queimadas por estado, região ou bioma
- Filtragem por ano e mês
- Retorno de dados em JSON
- Front-end com mapa, tabelas e gráficos
- Exibe mapa do Brasil para seleção do estado/região/bioma 
- Seleção entre visualizar dados em tabela ou gráfico
- Baixa dados mais recentes da API do INPE
- Armazena dados em cache para melhor performance
- Envia dados por e-mail como tabela
- Gerencia dados por estado ou agregados por região/bioma
- Compara dados entre anos, destacando máximos e mínimos

## Endpoints

A API provê os seguintes endpoints:

- `/queimadas` - Retorna dados agregados do Brasil
- `/queimadas/locale/{estado}` - Retorna dados por estado 
- `/queimadas/locale/{região}` - Retorna dados por região
- `/queimadas/locale/{bioma}` - Retorna dados por bioma

Parâmetros disponíveis:

- `ano` - Filtra por ano 
- `mes` - Filtra por mês

## Tecnologias

- PHP 
- MySQL
- JavaScript
- Chart.js (gráficos)
- SVG
- HTML/CSS

## Instalação

1. Clone o repositório
2. Importe o banco de dados SQL
3. Configure o acesso ao banco no arquivo `api/.env`
4. Acesse a pasta raiz do projeto no seu servidor web

## Licença

Este projeto está licenciado sob a Licença MIT. Consulte o arquivo [LICENSE](LICENSE) para mais detalhes.

## Créditos

DesmataMenos foi criado por [Will Golden].

Dados de queimadas pelo [INPE].
