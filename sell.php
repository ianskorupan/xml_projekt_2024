<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="styles.css">

        <title>choo.ns</title>
    </head>

    <style>
		#selltitle {
			color: white;
			font-family: Bahnschrift, sans-serif;
			margin: 32px 0px 0px 32px;
		}

		#sell_form{
            width: 100%;
			padding-top: 96px;
        }

        /* Bordered form */
        .sellform {
            width: 70%;
            border: 2px solid #f1f1f1;
            border-radius: 23px;
            background: black;
        }

        /* Full-width inputs */
        .forminput[type=text] {
            width: 100%;
            padding: 10px 20px;
            margin: 12px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 12px;
            box-sizing: border-box;
        }

		.form-select {
            width: 100%;
            padding: 10px 20px;
            margin: 12px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 12px;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        .formbutton {
            font-family: Bahnschrift, sans-serif;
            background-color: #60b543;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 12px;
        }

		.sellsubmit {
			padding-top: 32px;
		}

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

        /* Center the avatar image inside this container */
        .titlecontainer {
            text-align: center;
            margin: 66px 0 0 0;
        }

        /* Add padding to containers */
        .contcontainer {
            padding: 32px;
        }

        label{
            font-family: Bahnschrift, sans-serif;
            color: white;
        }

		.sectionlabel {
			font-family: Bahnschrift, sans-serif;
            color: white;
			margin: 32px 0px 12px 0px;
		}
    </style>

    <?php
        $con = mysqli_connect('localhost', 'root','');
        mysqli_select_db($con, 'choons');
        $sql = "SELECT * FROM forsale";
        $records = mysqli_query($con, $sql);
    ?>

    <body>

        <div id="main">

            <div id="header" class="container-fluid">
                <a href=index.php title="choo.ns homepage">
                    <h1 id="title" class="display-5">choo.ns</h1>
                </a>

                <div id="profile_controls" class="vertcent">
				<a href=sell.php>
                        <button id=sellbtn class="btn sellbtn bg-gradient">Sell</button>
                    </a>
                </div>
            </div>

			
            <div id="content" class="container">
                <div id="sell_form">
					<form action="add.php" method="post" class="sellform horizcent">

                		<h2 id="selltitle" class="display-4">Sell a physical release</h2>

                		<div class="contcontainer">
							<h2 class="sectionlabel">Release information:</h2>

                		    <label for="relname">Release name *</label>
                		    <input type="text" class="forminput" placeholder="Release" name="relname" required>

                		    <label for="artist">Artist *</label>
                		    <input type="text" class="forminput" placeholder="Artist" name="artist" required>

							<label for="media">Media type *</label>
                		    <select class="form-select" name="media" required>
								<option>CD</option>
								<option>Vinyl</option>
								<option>Cassette</option>
							</select>

							<label for="cat">Catalogue number *</label>
                		    <input type="text" class="forminput" placeholder="Cat#" name="cat" data-bs-toggle="tooltip" title="The catalogue number can be found on the packaging or the runout of the vinyl. Alternatively it can be found on an online database like Discogs." required>
							
							<label for="img">Image</label>
                		    <input type="text" class="forminput" placeholder="Image URL" name="img">

							<label for="price">Asking price (€) *</label>
                		    <input type="text" class="forminput" placeholder="Price" name="price" required>

							<label for="info">Additional info</label>
                		    <textarea type="text" class="forminput" placeholder="Condition, vinyl format, CD type, etc." name="info" style="word-wrap:normal;"></textarea>

							<h2 class="sectionlabel">Contact information:</h2>

							<label for="user">Seller name *</label>
                		    <input type="text" class="forminput" placeholder="Username" name="user" required>

                            <label for="location">Location *</label>
                		    <input type="text" class="forminput" placeholder="City, country" name="location" required>

							<label for="phone">Phone number *</label>
                		    <input type="text" class="forminput" placeholder="Phone number" name="phone" required>

							<label for="email">E-mail address</label>
                		    <input type="text" class="forminput" placeholder="E-mail" name="email">

							<div class="sellsubmit">
	                		    <button class="formbutton" type="submit">Sell</button>
							</div>
                		</div>
            		</form>
                </div>
            </div>

        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        </script>
    </body>
</html>