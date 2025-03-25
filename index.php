<?php
session_start();
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
    <h1>Chat en temps réel</h1>
    <div id="messages"></div>
    <div>
        <label for="messageInput">Message</label><br>
        <input type="text" id="messageInput" placeholder="Saisissez votre message"><br>
        <button id="sendButton">Envoyer</button>
    </div>
    

    <script>
        $(document).ready(function() {
            // Envoyer un message lors du clic sur le bouton "Envoyer"
            $('#sendButton').click(function() {
                var message = $('#messageInput').val();

                if (message.trim() !== "") {
                    $.post('enregistrement.php', { auteur: '<?php echo $_SESSION['username'] ?>', contenu: message }, function(data) {
                        $('#messageInput').val(''); // Vider la zone de saisie
                        console.log(data); // Afficher la réponse du serveur
                    });
                }
            });

            // Mettre à jour les messages toutes les 2 secondes
            setInterval(function() {
                $.get('recuperer.php', function(data) {
                    var messages = data;
                    var messagesHtml = '';

                    messages.forEach(function(message) {
                        console.log(document.querySelector("#messages > div#id"));
                        if(document.querySelector("#messages > div#id") === null)
                            messagesHtml += '<div id="' + messages["Id"] + '"><strong>' + message["auteur"] + ':</strong> ' + message["contenu"] + ' <small>(' + message["horaire"] + ')</small></div>';
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
