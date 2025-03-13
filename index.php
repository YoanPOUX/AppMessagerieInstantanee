<!DOCTYPE html>
<html>
<head>
    <title>Messagerie instantanée</title>
    <style src="style.css"></style>
    <link rel="icon" type="image/png" href="assets/messages-square.svg">
</head>
    <script>
        function getMessage() {
            var auteurId = document.getElementById("auteur").value;

            if (auteurId) {
                var xhr = new XMLHttpRequest();
                xhr.open("GET", "getLivres.php?auteurId=" + auteurId, true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        document.getElementById("livre").innerHTML = xhr.responseText;
                    }
                };
                xhr.send();
            } else {
                document.getElementById("livre").innerHTML = '<option value="">Sélectionner un livre</option>';
            }
        }
    </script>
<body>
    <div class="main">
        <div class="header">
            <h1>Messagerie instantanée</h1>
        </div>
        <div class="content">
            <?php include 'recuperer.php';
            getMessage(); ?>
        </div>
        <div class="footer">
            <form action="enregistrement.php" method="post">
                <input type="text" name="content" placeholder="Votre message">
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</body>
</html>