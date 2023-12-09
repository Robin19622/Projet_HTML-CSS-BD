<?php
/**
 * Classe conf
 *
 * Cette classe contient les paramètres de configuration de l'application.
 */
class conf
{
    /**
     * @var string $tags
     * Une chaîne contenant les balises HTML autorisées dans l'application.
     */
    public static string $tags = "<br><p><i><u><h1><h2><h3><h4><h5><h6><strong><small><b><table><td><th><tr><a><ul><li><ol><tbody><figure></blockquote>";

    /**
     * @var array $databases
     * Un tableau associatif contenant les configurations de base de données.
     * Chaque clé du tableau représente une connexion de base de données différente.
     * Chaque valeur est un tableau associatif contenant les clés suivantes :
     * - 'host': Le nom d'hôte du serveur de base de données.
     * - 'database': Le nom de la base de données.
     * - 'public': Le nom d'utilisateur à utiliser pour se connecter à la base de données.
     * - 'password': Le mot de passe à utiliser pour se connecter à la base de données.
     */
    public static array $databases = array(
        'default' => array(
            'host' => 'db',
            'database' => 'humanRessource',
            'public' => 'root',
            'password' => 'example',
        )
    );
}