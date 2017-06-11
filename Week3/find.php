<html>
		<head>
	<title>Find a Contact</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="styles/custom.css" />
<link rel="stylesheet" href="themes/rasmussenthemeroller.min.css" />
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile.structure-1.4.5.min.css" />
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="javascript/storage.js"></script>
</head>
	<body>
		<div id="page" data-role="page" data-theme="b" >
	<div data-role="header" data-theme="b">
<h1>
	Find your contact
		</h1>	</div>
				<div data-role="content">


					<?php
					include 'config.php';
					include 'opendb.php';

					$fname = (isset($_POST['fname'])    ? $_POST['fname']   : '');
					$lname = (isset($_POST['lname'])    ? $_POST['lname']   : '');

					$sql= "SELECT clients.clientID, clients.fname, clients.lname, membership.category, membership.description  from clients
					JOIN membership on clients.clientID = membership.clientID
					ORDER BY clients.lname ASC '$conf_num' LIMIT 100";
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result)) {
									echo "ID: " . $row["clientid"]. "<br>";
					        echo "First Name: " . $row["fname"]. "<br>";
					        echo "Last Name: " . $row["lname"]. "<br><hr>";
							echo "State: " . $row["state"]. "<br>";
									echo "Client ID: " . $row["id"]. "<br>";
									echo "Membership: " . $row["category"]. "<br>";
					    }
					} else {
					    echo "0 results";
					}

					mysqli_close($conn);

					?>
				</div>
			</div>
				<div data-role="footer" data-theme="b">
	  <h4>William Adams &copy; 2017</h4>
	</div>
	</body>
</html>
