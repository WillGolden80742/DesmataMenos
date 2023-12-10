
# DesmataMenos

DesmataMenos is a system for tracking data on fires in Brazil. It provides an API to query this data, as well as a front-end for visualization.

## Features

- Query fire data by state, region, or biome
- Filter by year and month
- Return data in JSON
- Front-end with map, tables, and charts
- Displays a map of Brazil for selecting the state/region/biome
- Selects between viewing data in a table or chart
- Downloads the latest data from the INPE API
- Stores data in cache for better performance
- Sends data by email as a table
- Manages data by state or aggregated by region/biome
- Compares data between years, highlighting maximums and minimums

## Endpoints

The API provides the following endpoints:

- api/queimadas - Returns aggregated data for Brazil
- api/queimadas/locale/{estado} - Returns data by state
- api/queimadas/locale/{região} - Returns data by region
- api/queimadas/locale/{bioma} - Returns data by biome

Available parameters:

- ano - Filters by year

- mes - Filters by month

## Technologies

PHP
MySQL
JavaScript
Chart.js (charts)
SVG
HTML/CSS
## Installation

Clone the repository
Import the SQL database
Configure database access in the api/.env file
Access the project root directory on your web server
## License

This project is licensed under the MIT License. See the LICENSE: LICENSE file for more details.

## Credits

DesmataMenos was created by [Will Golden].

Fire data by [INPE].

Here is a more natural-sounding translation:

# DesmataMenos

DesmataMenos is a system that tracks data on fires in Brazil. It provides an API to query this data, as well as a front-end for visualizing it.

## Features

Query fire data by state, region, or biome
Filter by year and month
Return data in JSON format
Front-end with a map, tables, and charts
Displays a map of Brazil for selecting the state/region/biome
Allows users to choose between viewing data in a table or chart
Downloads the latest data from the INPE API
Stores data in cache for better performance
Sends data by email as a table
Allows users to manage data by state or aggregate it by region/biome
Compares data between years, highlighting maximums and minimums
## Endpoints

The API provides the following endpoints:

api/queimadas - Returns aggregated data for Brazil
api/queimadas/locale/{estado} - Returns data by state
api/queimadas/locale/{região} - Returns data by region
api/queimadas/locale/{bioma} - Returns data by biome
Available parameters:

ano - Filters by year
mes - Filters by month
## Technologies

PHP
MySQL
JavaScript
Chart.js (charts)
SVG
HTML/CSS
## Installation

Clone the repository
Import the SQL database
Configure database access in the api/.env file
Access the project root directory on your web server
## License

This project is licensed under the MIT License. See the LICENSE: LICENSE file for more details.

## Credits

DesmataMenos was created by [Will Golden].

Fire data by [INPE].
