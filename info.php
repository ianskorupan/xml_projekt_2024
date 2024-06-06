<?php

$id = $_GET['id'];

$forsale = new DomDocument;
$forsale->validateOnParse = true;
$forsale->Load('data/forsale.xml');
$item = new DOMXPath($forsale);

foreach ($item->query("//item[@id=$id]/artist") as $x)
    $artist = $x->textContent;
foreach ($item->query("//item[@id=$id]/release") as $x)
    $release = $x->textContent;
foreach ($item->query("//item[@id=$id]/catno") as $x)
    $catno = $x->textContent;
foreach ($item->query("//item[@id=$id]/medium") as $x)
    $medium = $x->textContent;
foreach ($item->query("//item[@id=$id]/img") as $x)
    $img = $x->textContent;
foreach ($item->query("//item[@id=$id]/price") as $x)
    $price = $x->textContent;
foreach ($item->query("//item[@id=$id]/comment") as $x)
    $comment = $x->textContent;
foreach ($item->query("//item[@id=$id]/seller") as $x)
    $seller = $x->textContent;

$users = json_decode(file_get_contents('data/users.json'), true);
foreach ($users["users"] as $user) {
    if ($user["name"] == $seller) {
        $result = $user;
        break;
    }
}

?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">

    <title>choo.ns</title>
</head>

<style>
    #content {
        margin-top: 64px;
    }

    .flex-wrap {
        display: flex;
    }

    h2 {
        margin-bottom: 24px;
    }

    h3 {
        font-family: Bahnschrift, sans-serif;
    }

    #relimg {
        margin-right: 52px;
    }

    #relinfo {
        top: 50x;
        margin-right: 52px;
        width: 500px;
        word-wrap: normal;
    }

    #pricelabel {
        margin-top: 32px;
    }

    #price {
        font-size: 48px;
        margin-top: -24px;
    }

    #contactinfo {
        background-color: #323232;
        width: 350px;
        ;
    }
</style>



<body>

    <div id="main">

        <div id="header" class="container-fluid">
            <a href=index.php title="choo.ns homepage">
                <h1 id="title" class="display-5">choo.ns</h1>
            </a>
        </div>

        <div id="content" class="container horizcent">
            <div id="releaseinfo" class="flex-wrap">

                <div id=relimg>
                    <image src="<?php echo $img ?>" width=300px />
                </div>

                <div id=relinfo>
                    <h2><?php echo $artist ?> - <?php echo $release; ?></h2>
                    <p>Format: <?php echo $medium ?></p>
                    <p>Catalogue number: <?php echo $catno ?></p>
                    <p>Seller notes: <?php echo $comment ?></p>

                    <p id=pricelabel>Asking price:</p>
                    <p id=price><?php echo $price ?> €</p>
                </div>

                <div id=contactinfo class="mt-4 p-5 text-white rounded">
                    <h3 style="margin-bottom:24px">Contact info</h3>
                    <p>Seller name: <?php echo $user['name'] ?></p>
                    <p>Location: <?php echo $user['location'] ?></p>
                    <p>Phone number: <?php echo $user['phone'] ?></p>
                    <p>E-mail: <?php if (!($user['email']))
                        echo "not provided";
                    else
                        echo $user['email']; ?></p>
                </div>

            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>

</html>
