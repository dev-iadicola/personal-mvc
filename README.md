# Introducing the MVC Framework

## PHP 8 requirements

Mine MVC Framework provides a robust and flexible solution for building modern web applications. This framework follows the Model-View-Controller (MVC) architectural pattern, which separates application logic into three interconnected components. This separation helps manage complexity and enhance maintainability.

## Core Features

- **Request and Response Handling**: Captures and manages HTTP requests and constructs and sends HTTP responses, integrating seamlessly with views.
- **Routing**: Directs incoming requests to the appropriate controllers and actions based on defined routes.
- **View Management**: Facilitates rendering views with data, allowing for a clean separation of presentation and logic.
- **File Uploads**: Handles file uploads securely and efficiently.
- **Database Integration**: Utilizes PHP Data Objects (PDO) for database interactions, providing a consistent and secure way to handle database operations.
- **SMTP and Email**: Manages SMTP connections for sending emails and integrates with SMTP to provide email sending capabilities.
- **Session Management**: Manages user sessions, supporting authentication and data persistence across requests.
- **Middleware**: Allows for flexible request processing and manipulation before reaching the core application logic.
- **Exception Handling**: Handles cases where requested resources are not found, returning appropriate HTTP status codes.

## How It Works

1. **Initialization**: The framework is initialized with a configuration array, setting up essential services such as routing, view handling, file uploads, database connections, SMTP configuration, and session management.
2. **Running the Application**: The `run` method starts the application. It resolves the incoming request by matching it to the defined routes. If an error occurs (e.g., route not found), it handles exceptions and provides a suitable response.
3. **Error Handling**:
    - **Database Connection**: Establishes a PDO connection to the database, handling errors gracefully.
    - **SMTP Connection**: Connects to the SMTP server for email operations, ensuring that email-related errors are managed.


# Introduzione al Framework MVC
## Requisiti PHP 8
Il Framework MVC offre una soluzione robusta e flessibile per la creazione di applicazioni web moderne. Questo framework segue il modello architetturale Model-View-Controller (MVC), che separa la logica dell'applicazione in tre componenti interconnesse. Questa separazione aiuta a gestire la complessità e migliora la manutenibilità.

## Caratteristiche Principali

- **Gestione delle Richieste e Risposte**: Cattura e gestisce le richieste HTTP e costruisce e invia le risposte HTTP, integrandosi perfettamente con le viste.
- **Routing**: Indirizza le richieste in arrivo ai controller e alle azioni appropriate in base alle rotte definite.
- **Gestione delle Viste**: Facilita il rendering delle viste con i dati, consentendo una chiara separazione tra presentazione e logica.
- **Caricamenti di File**: Gestisce i caricamenti di file in modo sicuro ed efficiente.
- **Integrazione con il Database**: Utilizza PHP Data Objects (PDO) per le interazioni con il database, fornendo un modo coerente e sicuro per gestire le operazioni sul database.
- **SMTP e Email**: Gestisce le connessioni SMTP per l'invio di email e si integra con SMTP per fornire funzionalità di invio email.
- **Gestione delle Sessioni**: Gestisce le sessioni utente, supportando l'autenticazione e la persistenza dei dati tra le richieste.
- **Middleware**: Consente un'elaborazione e una manipolazione flessibile delle richieste prima di raggiungere la logica principale dell'applicazione.
- **Gestione delle Eccezioni**: Gestisce i casi in cui le risorse richieste non vengono trovate, restituendo i codici di stato HTTP appropriati.

## Come Funziona

1. **Inizializzazione**: Il framework viene inizializzato con un array di configurazione, impostando i servizi essenziali come il routing, la gestione delle viste, i caricamenti di file, le connessioni al database, la configurazione SMTP e la gestione delle sessioni.
2. **Esecuzione dell'Applicazione**: Il metodo `run` avvia l'applicazione. Risolve la richiesta in arrivo abbinandola alle rotte definite. Se si verifica un errore (ad esempio, rotta non trovata), gestisce le eccezioni e fornisce una risposta adeguata.
3. **Gestione degli Errori**:
    - **Connessione al Database**: Stabilisce una connessione PDO al database, gestendo gli errori in modo elegante.
    - **Connessione SMTP**: Si connette al server SMTP per le operazioni email, assicurando che gli errori legati alle email siano gestiti.
