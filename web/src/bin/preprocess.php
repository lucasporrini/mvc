<?php
    function generateRelativeURL($path) {
        $baseURL = SITE_URL;
        $currentURL = $_SERVER['REQUEST_URI'];
    
        // Comptez le nombre de répertoires à remonter pour atteindre la racine de votre application
        $upDirectories = str_repeat('../', substr_count($currentURL, '/'));
    
        // Construisez l'URL relative en utilisant vos constantes
        $relativeURL = $upDirectories . $baseURL . $path;
    
        return $relativeURL;
    }    

    function findSVGByName($name) {
        $svg = file_get_contents(BASE_URL . "public/assets/icons/" . $name . ".svg");
        return $svg;
    }

    function addProductRef(int $categorie_parent, int $categorie_enfant) {
        // TODO: Gérer la création automatique des références
        // Récupérer la dernière référence en base de données : $lastRef
    }

    function writeLogs($user, $action, $isError = false) {
        $date = date("Y-m-d H:i:s");
        
        if ($isError) {
            // Message d'erreur en rouge
            $log = "Error: " . $date . " - " . $user . " - " . $action . "\n";
        } else {
            // Message d'erreur en vert
            $log = $date . " - " . $user . " - " . $action . "\n";
        }

        file_put_contents(RELATIVE_PATH_LOGS . "error.log", $log, FILE_APPEND);
    }

    function generateOTP()
    {
        $otp = mt_rand(100000, 999999);
        return $otp;
    }

    function sendOtpByMail($to, $subject, $message)
    {
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8\r\n";
        $headers .= "From: Reborn <noreply@reborn.green>\r\n";
        $headers .= "Reply-To: noreply@reborn.green\r\n";


        if(mail($to, $subject, $message, $headers)) {
            if(isset($_SESSION['user']['username'])) {
                // On écrit dans les logs
                writeLogs($_SESSION['user']['username'], "Mail envoyé à " . $to);
            } else {
                // On écrit dans les logs
                writeLogs("Anonyme", "Mail envoyé à " . $to);
            }
            return true;
        } else {
            if(isset($_SESSION['user']['username'])) {
                // On écrit dans les logs
                writeLogs($_SESSION['user']['username'], "Erreur lors de l'envoi du mail à " . $to, true);
            } else {
                // On écrit dans les logs
                writeLogs("Anonyme", "Erreur lors de l'envoi du mail à " . $to, true);
            }
            return false;
        }
    }

    function getMailDesignOtp($otp)
    {
        $mailDesign = '
            <html>
            <head>
                <title>Validation de votre compte</title>
            </head>
            <body>
                <table width="100%" style="max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif; background-color: #f3f3f3;">
                    <tr>
                        <td align="center" style="background-color: #ffffff; padding: 20px; border-top: 4px solid #18af56;">
                            <img src="https://jobs.groupe-remove.com/public/assets/img/logo.png" alt="Logo Reborn" style="max-width: 150px;color: #1f3355">
                            <h2 style="color: #333;">Validation de compte</h2>
                            <p>Bienvenue sur notre plateforme. Pour activer votre compte, veuillez utiliser le code de validation ci-dessous :</p>
                            <p style="font-size: 24px; font-weight: bold; color: #18af56;">' . $otp . '</p>
                            <p>Si vous n\'avez pas demandé cette validation, veuillez ignorer ce message.</p>
                            <p>Merci de nous avoir rejoints.</p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="background-color: #f3f3f3; padding: 20px; border-top: 4px solid #18af56;">
                            <p style="color: #777;">Pour toute question ou assistance, veuillez nous contacter à l\'adresse : <a href="mailto:contact@groupe-remove.com">contact@groupe-remove.com</a></p>
                        </td>
                    </tr>
                </table>
            </body>
            </html>
        ';

        return $mailDesign;
    }

    function createProductFolder($slug)
    {
        // Création du dossier de profil
        $path = BASE_URL . "public/uploads/" . $slug;
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
    }
?>