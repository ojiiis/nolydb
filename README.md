<div>
  <h2>NolyDB PHP SDK</h2>
  
  <h3>Installation</h3>
  <p>To include the NolyDB SDK in your PHP project, follow these steps:</p>
  <ol>
    <li>Clone or download the SDK from the <a href="https://github.com/ojiiis/nolydbPHP-SDK">NolyDB SDK GitHub repository</a>.</li>
    <li>Place the <code>nolydbSDK.php</code> file in your project directory.</li>
    <li>Include the SDK in your PHP script using the <code>require</code> or <code>require_once</code> statement.</li>
  </ol>
  
  <h3>Initialization</h3>
  <p>To use the NolyDB SDK, you need to initialize an instance of the <code>ndbSDK</code> class with your NolyDB username and API token.</p>
  <pre><code>$ndb = new ndbSDK('your_username', 'your_token');</code></pre>
  
  <h3>Methods</h3>
  
  <h4>createAccount($username, $email, $password)</h4>
  <p>Create a new user account in NolyDB with the specified username, email, and password.</p>
  
  <h4>makeDB($database)</h4>
  <p>Create a new database with the specified name in your NolyDB account.</p>
  
  <h4>dropDB($database)</h4>
  <p>Delete a database with the specified name from your NolyDB account.</p>
  
  <h4>makeTABLE($db, $table, $scheme)</h4>
  <p>Create a new table with the specified name and schema in the given database.</p>
  
  <h4>addToTABLE($db, $table, $data)</h4>
  <p>Add data to a table in the specified database. The data should be provided as an array.</p>
  
  <h4>dropTABLE($db, $table)</h4>
  <p>Delete a table with the specified name from the given database.</p>
  
  <h4>selectTABLE($db, $table, $option)</h4>
  <p>Select and retrieve data from a table in the specified database based on the provided query options.</p>
  
  <h4>updateTABLE($db, $table,$set, $option)</h4>
  <p>Update data in a table in the specified database based on the provided query options.</p>
  
  <!-- Add more sections for each method and their descriptions -->
  
  <!-- Example usage and output -->
  <h3>Example Usage</h3>
  <p>Here's an example of how you can use the NolyDB SDK:</p>
  <pre><code>
// Initialize the SDK
$ndb = new ndbSDK('your_username', 'your_token');

// Create a new database
$ndb->makeDB('your_database');

// Create a new table
$scheme = [
    'column1' => 'int',
    'column2' => 'str'
];
$ndb->makeTABLE('your_database', 'your_table', $scheme);

// Add data to the table
$data = [
    'column1' => 123,
    'column2' => 'example data'
];
$ndb->addToTABLE('your_database', 'your_table', $data);

// Select data from the table
$options = [
    'type' => 'where',
    'data' => [
        'column1' => 123
    ]
];


$response = $ndb->selectTABLE('your_database', 'your_table', $options);

// Display the retrieved data
$data = json_decode($response, true);
if ($data['status'] === 1) {
    foreach ($data['data'] as $row) {
        echo "<p>Column 1: " . $row['column1'] . "</p>";
        echo "<p>Column 2: " . $row['column2'] . "</p>";
        echo "<br>";
    }
} else {
    echo "<p>An error occurred: " . implode(", ", $data['er']) . "</p>";
}


</code>
</pre>
  
  <p>
    Please note that this is a simplified example, and you should modify the code based on your specific requirements and error handling needs.
</p><p>
The code above demonstrates the basic usage of the NolyDB SDK. It initializes the SDK, creates a database, creates a table, adds data to the table, selects data from the table based on certain criteria, and then displays the retrieved data.
</p><p>
The retrieved data is outputted using HTML tags to structure the information. Each row from the selected data is displayed with its column values. In case of any errors, an error message is displayed instead.
</p><p>
Remember to replace 'your_username', 'your_token', 'your_database', and 'your_table' with your actual NolyDB username, token, database name, and table name.
</p><p>
This example provides a starting point for using the NolyDB SDK and interacting with NolyDB databases in your PHP applicatio
  </p>
<h2>Contributing</h2>

<p>Contributions are welcome! If you have any ideas, suggestions, or bug reports, please open an issue or submit a pull request on the <a href="https://github.com/ojiiis">GitHub repository</a>.</p>

<h2>License</h2>

<p>This project is licensed under the <a href="https://opensource.org/licenses/MIT">MIT License</a>.</p>

<hr>

<p>Feel free to customize the README according to your specific project details and add any additional sections that might be relevant.</p>
