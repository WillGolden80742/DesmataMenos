# DesmataMenos

DesmataMenos is a system that tracks data on fires in Brazil. It provides an API to query this data, as well as a front-end for visualizing it.

## Features

- Query fire data by state, region, or biome
- Filter by year and month
- Return data in JSON format
- Front-end with a map, tables, and charts
- Displays a map of Brazil for selecting the state
- Allows users to choose between viewing data in a table or chart
- Downloads the latest data from the INPE API
- Stores data in cache for better performance
- Sends data by email as a table
- Allows users to manage data by state or aggregate it by region/biome
- Compares data between years, highlighting maximums and minimums

## Endpoints

The API provides the following endpoints:

- api/queimadas - Returns aggregated data for Brazil
- api/queimadas/locale/{state} - Returns data by state
- api/queimadas/locale/{region} - Returns data by region
- api/queimadas/locale/{biome} - Returns data by biome

Available parameters:

- ano - Filters by year
- mes - Filters by month

## Technologies

- PHP
- MySQL
- JavaScript
- Chart.js (charts)
- SVG
- HTML/CSS

## Installation

- Clone the repository
- Import the SQL database
- Configure database access in the api/.env file
- Access the project root directory on your web server

## Demostration
![Captura de tela de 2023-12-10 14-47-43](https://github.com/WillGolden80742/DesmataMenos/assets/91426752/5635d98c-b2b2-40f3-bb3b-2813f0a40ddb)
![image](https://github.com/WillGolden80742/DesmataMenos/assets/91426752/8b8fc4cc-972e-463b-ae44-23bc04e728f7)
![image](https://github.com/WillGolden80742/DesmataMenos/assets/91426752/3b4f71da-244d-4c02-92a6-a8a642d5ee9d)

## Credits

DesmataMenos was created by [Will Golden](https://github.com/willgolden80742/).

Fire data by [INPE](https://queimadas.dgi.inpe.br/queimadas/portal-static/estatisticas_estados/).
