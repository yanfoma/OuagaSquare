<?php

function citation_du_jour(){
        // nom du fichier ou setrouve les citations
    $nom_du_fichier_texte = "citations.txt";
        // ouverture du fichier
    $f1 = fopen($nom_du_fichier_texte, "r");
        // lecture du fichier
    $contenu = fread($f1, filesize($nom_du_fichier_texte));
        // fermeture du fichier
    fclose($f1);
        // on place les citations dans un tableau
    $tab_numero_citation = explode("\n",$contenu);
        // l'argument 'z' retourne le jour de l'année
    $date = date("N");
        // si le jour de l'année est supérieur au nombre de ligne du fichier
        // c'est la première citation qui s'affiche
    if($date > count($tab_numero_citation)){
        return $tab_numero_citation[0];
        // sinon on affiche la citation correspondant au jour
    }else{
        return $tab_numero_citation[$date];
    }
}
?>