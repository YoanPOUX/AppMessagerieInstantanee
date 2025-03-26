<?php
session_start();
if(empty($_SESSION['username']) || empty($_SESSION['id']))
    header('Location: compte.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Application de Messagerie Instantanée</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/svg" href="assets/messages-square.svg">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<main>

    <h1 style="margin-left: 10%">Chat en temps réel</h1>
    <section>

    <div id="messages"></div>
    <div id="bottombar">
        <input type="text" id="messageInput" placeholder="Saisissez votre message"><br>
        <button id="sendButton">Envoyer</button>
    </div>
    <a href="db/connexioncompte.php">Se déconnecter</a>
    </section>
</main>

    <script>
        $(document).ready(function() {
            // Envoyer un message lors du clic sur le bouton "Envoyer"
            $('#sendButton').click(function() {
                var message = $('#messageInput').val();

                if (message.trim() !== "") {
                    $.post('./db/enregistrement.php', { auteur: '<?php echo $_SESSION['username'] ?>', contenu: message }, function(data) {
                        $('#messageInput').val(''); // Vider la zone de saisie
                        console.log(data); // Afficher la réponse du serveur
                    });
                }
            });

            // Mettre à jour les messages toutes les 2 secondes
            setInterval(function() {
                $.get('./db/recuperer.php', function(data) {
                    var messages = data;
                    var messagesHtml = '';

                    messages.forEach(function(message) {
                        console.log(document.querySelector("#messages > div#id"));
                        if(document.querySelector("#messages > div#id") === null)
                            messagesHtml += '<div class="message"><strong>' + message["auteur"] + ':</strong> ' + message["contenu"] + ' <small class="message-hour">(' + message["horaire"] + ')</small></div>';
                    });

                    $('#messages').html(messagesHtml);
                });
            }, 2000);

            // Envoyer un message lors de l'appui sur la touche Entrée
            $('#messageInput').keyup(function(event) {
                if (event.keyCode === 13) { // Code ASCII pour Entrée
                    $('#sendButton').click();
                }
            });
        });
    </script>
</body>
</html>
