<?php

namespace App\Commun;

use App\Commun\Config;

class Upload
{

    function __construct(Config $config)
    {

    }

    public function gererUpload($objUploadedFile, $dossierCible)
    {
        dump($this);

        $nomOrigine = $objUploadedFile->getClientOriginalName();
        $extensionOrigine = strtolower($objUploadedFile->getClientOriginalExtension());
        // $extensionOrigine = strtolower(pathinfo($nomOrigine, PATHINFO_EXTENSION));
        dump($extensionOrigine);
        $tabExtensionOK = ["jpg", "jpeg", "gif", "png"];
        if (in_array($extensionOrigine, $tabExtensionOK)) {
            // IMPORTANT: AJOUTER LA SECURITE SUR LA VERIF DU FICHIER (pas de .php)
            // ON VA DEPLACER LE FICHIER UPLOADE DANS LE DOSSIER assets/upload/
            // AJOUTER LE CHEMIN DANS config/services.yaml
            // parameters:
            //     monDossierUpload: '%kernel.project_dir%/public/assets/upload'
            $objUploadedFile->move($dossierCible, $nomOrigine);
            // ICI IL FAUDRAIT CREER LES MINIATURES
        } else {
            // ERREUR SUR L'UPLOAD
            $nomOrigine = "";
        }

        return $nomOrigine;
    }
}
