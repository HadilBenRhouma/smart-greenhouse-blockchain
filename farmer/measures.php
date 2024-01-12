<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blockchain Data</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
    </style>
</head>
<body>

<h2>Latest Blockchain Data</h2>
<table>
    <tr>
        <th>Temperature</th>
        <th>Humidity Air</th>
        <th>Humidity Soil</th>
    </tr>
    <tbody id="dataBody"></tbody>
</table>

<script>

    async function fetchData() {
        try {
            const response = await fetch('http://localhost:3000');  // Replace with your server URL
            const data = await response.json();
            displayData(data);
        } catch (error) {
            console.error('Error fetching data:', error);
        }
    }

    function displayData(data) {
        const dataBody = document.getElementById('dataBody');

        const row = document.createElement('tr');
        row.innerHTML = `<td>${data.temperature}</td><td>${data.humiditeAir}</td><td>${data.humiditeSol}</td>`;

        dataBody.innerHTML = '';  // Clear previous data
        dataBody.appendChild(row);
    }

    // Fetch and display data on page load
    fetchData();
</script>

</body>
</html>

 