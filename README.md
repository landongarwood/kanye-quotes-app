# Kanye Quotes App

This application displays random Kanye West quotes, built with Laravel, Livewire, and Laravel Sanctum for API token-based authentication. It includes a public API endpoint to fetch random quotes and a frontend to display them, with automatic refresh functionality.

### Screenshots
![Login Desktop](https://github.com/landongarwood/kanye-quotes-app/raw/main/screenshots/login-desktop.png)
![Quotes Desktop](https://github.com/landongarwood/kanye-quotes-app/raw/main/screenshots/quotes-desktop.png)
![Login Mobile](https://github.com/landongarwood/kanye-quotes-app/raw/main/screenshots/login-mobile.png)
![Quotes Mobile](https://github.com/landongarwood/kanye-quotes-app/raw/main/screenshots/quotes-mobile.png)

## Prerequisites

Ensure you have the following installed:

-   **Docker** and **Docker Compose** (required for Laravel Sail)
-   **Node.js & npm** (for frontend asset compilation)

## Setup Instructions

### 1. Clone the Repository

Clone the repository and navigate into the project directory:

```bash
git clone git@github.com:landongarwood/kanye-quotes-app.git && cd kanye-quotes-app
```

### 2. Install Dependencies

Use Laravel Sail to install PHP and Node.js dependencies:

```bash
sail composer install && sail npm install
```

### 3. Set Up Environment Variables

Copy .env.example to create a new .env file, and update the following variables as needed:

```bash
APP_NAME="Kanye West Quotes"
APP_PORT=8080
API_HOST=http://host.docker.internal:8080
```

### 4. Run database migration and generate Application Key

Generate the application key for security by running:

```bash
sail artisan db:migrate
sail artisan key:generate
```

### 5. Compile Frontend Assets

Generate the application key for security by running:

```bash
## For development
sail npm run dev

## For Production
sail npm run build
```

### 6. Start the Application

To start the application, launch Laravel Sail:

```bash
sail up -d
```

### 7. Testing

To run all tests (feature and unit tests):

```bash
sail artisan test
```

#### Visit http://localhost:8080
