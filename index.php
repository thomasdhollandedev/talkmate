<?php
include 'db_connect.php';
include 'queries.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Vente de figurines</title>
</head>

<body>
    <section id="figurines">
        <div class="figurines-title">
            <h1>Figurines</h1>
        </div>
        <div class="figurines-list">
            <?php

            $figurines = getAllFigurines();

            if (!empty($figurines)) :
                foreach ($figurines as $figurine) :
                    $figurine_name = $figurine['Name'];
                    $figurine_price = $figurine['Price'];
                    $figurine_brand = $figurine['Brand'];
                    $figurine_number = $figurine['Number'];
                    $figurine_picture = $figurine['Picture'];

                    $licence_infos = getLicenceById($figurine['LicenceID']);

                    if (!empty($licence_infos)) :
                        foreach ($licence_infos as $licence) :
                            $licence_name = $licence['Name'];
            ?>

                            <div class="card">
                                <div class="card-image">
                                    <img src="./assets/img/figurines/<?= $figurine_number ?>" alt="<?= $figurine_name ?>">
                                </div>
                                <div class="card-text">
                                    <div class="card-text-licence">
                                        <?= $licence_name ?>
                                    </div>
                                    <div class="card-text-name">
                                        <?= $figurine_brand . " " . $figurine_name ?>
                                    </div>
                                </div>
                                <div class="card-price">
                                    <?= $figurine_price ?> €
                                </div>
                                <div class="card-button">
                                    <button>Ajouter au panier</button>
                                </div>
                            </div>

            <?php
                        endforeach;
                    endif;
                endforeach;
            endif;

            ?>
        </div>
    </section>

    <button class="chatbot-button btn-grad">
        <img src="./assets/icons/question.svg" alt="">
        Assistance
    </button>

    <section id="chatbot" class="hidden">
        <div class="chatbot-content">
            <div class="chatbot-header">
                <div class="chatbot-header-text">
                    TalkMate
                </div>
                <div class="chatbot-header-close">
                    <img src="./assets/icons/close.svg" alt="" class="chatbot-close">
                </div>
            </div>

            <div id="chatbox">
            </div>

            <div class="chatbot-footer">
                <textarea type="text" name="text_chatbot" placeholder="Tapez votre question ici ..." id="userInput"></textarea>
                <button type="button" name="button_chatbot" class="chatbot_send">
                    <img src="./assets/icons/send.svg" alt="">
                </button>
            </div>
        </div>
    </section>
    <script src="./assets/js/script.js"></script>
</body>

</html>