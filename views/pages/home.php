<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-4xl font-bold mb-6">Introducing the MVC Framework</h1>
    <p class="mb-4">Our MVC Framework provides a robust and flexible solution for building modern web applications. This framework follows the Model-View-Controller (MVC) architectural pattern, which separates application logic into three interconnected components. This separation helps manage complexity and enhance maintainability.</p>

    <h2 class="text-3xl font-semibold mb-4 text-stone-100">Core Features</h2>
    <ul class="list-disc list-inside mb-6 space-y-2 text-stone-100">
        <li><strong>Request and Response Handling</strong>: Captures and manages HTTP requests and constructs and sends HTTP responses, integrating seamlessly with views.</li>
        <li><strong>Routing</strong>: Directs incoming requests to the appropriate controllers and actions based on defined routes.</li>
        <li><strong>View Management</strong>: Facilitates rendering views with data, allowing for a clean separation of presentation and logic.</li>
        <li><strong>File Uploads</strong>: Handles file uploads securely and efficiently.</li>
        <li><strong>Database Integration</strong>: Utilizes PHP Data Objects (PDO) for database interactions, providing a consistent and secure way to handle database operations.</li>
        <li><strong>SMTP and Email</strong>: Manages SMTP connections for sending emails and integrates with SMTP to provide email sending capabilities.</li>
        <li><strong>Session Management</strong>: Manages user sessions, supporting authentication and data persistence across requests.</li>
        <li><strong>Middleware</strong>: Allows for flexible request processing and manipulation before reaching the core application logic.</li>
        <li><strong>Exception Handling</strong>: Handles cases where requested resources are not found, returning appropriate HTTP status codes.</li>
    </ul>

    <h2 class="text-3xl font-semibold mb-4 text-stone-100">How It Works</h2>
    <ol class="list-decimal list-inside mb-6 space-y-2 text-stone-100">
        <li><strong>Initialization</strong>: The framework is initialized with a configuration array, setting up essential services such as routing, view handling, file uploads, database connections, SMTP configuration, and session management.</li>
        <li><strong>Running the Application</strong>: The <code class="bg-black-200 p-1 rounded">run</code> method starts the application. It resolves the incoming request by matching it to the defined routes. If an error occurs (e.g., route not found), it handles exceptions and provides a suitable response.</li>
        <li><strong>Error Handling</strong>:
            <ul class="list-disc list-inside">
                <li><strong>Database Connection</strong>: Establishes a PDO connection to the database, handling errors gracefully.</li>
                <li><strong>SMTP Connection</strong>: Connects to the SMTP server for email operations, ensuring that email-related errors are managed.</li>
            </ul>
        </li>
    </ol>
</div>