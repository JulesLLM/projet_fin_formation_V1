<?php
//AbstractManager = gestionnaire global pour les modèles 
namespace Framework\Manager;

// on inclut le fichier de configuration de la BDD
require dirname(__DIR__, 2) . '/config/database.php';

// abstract = partage des propriétés / méthodes aux classes qui en hérite
abstract class AbstractManager {
    //retourne la connexion à la BDD par la classe PDO
     private function connect(): \PDO {
        $db = new \PDO(
          "mysql:host=" . DB_INFOS['host'] . ";dbname=" . DB_INFOS['dbname'],
          DB_INFOS['username'],
          DB_INFOS['password']
        );
        // affiche les potentielles erreurs de requêtes SQL
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        //prévient éventuels problèmes d'encodage des caractères spéciaux
        $db->exec("SET NAMES utf8");
        return $db;
      }
    // exécuter les requêtes SQL (SELECT, INSERT etc.)
    //params = tableau de paramètres à binder si la requête contient :
    private function executeQuery(string $query, array $params = []): \PDOStatement {
    $db = $this->connect();
    $stmt = $db->prepare($query);
    foreach ($params as $key => $param) $stmt->bindValue($key, $param);
    $stmt->execute();
    return $stmt;
  }
    // rôle = convertir le namespace d'une entité en nom de table
    //$class = string, namespace d'une entité
    private function classToTable(string $class): string {
    // explode sépare le namespace de la classe par \
    $tmp = explode('\\', $class);
    // retourne la dernière valeur du tableau $tmp
    return strtolower(end($tmp));
    //strtolower retourne la chaine en minuscule
  }
  
  // fonction dédiée à la récupération d'une ressource
  protected function readOne(string $class, array $filters): mixed {
    $query = 'SELECT * FROM ' . $this->classToTable($class) . ' WHERE ';
    foreach (array_keys($filters) as $filter) {
      $query .= $filter . " = :" . $filter;
      if ($filter != array_key_last($filters)) $query .= 'AND ';
    }
    
    $stmt = $this->executeQuery($query, $filters);
    //FetchMode(...) permet de récupère les données de la BDD sous forme d'objet de la classe spécifiée par $class
    //Les propriétés de l'objet sont ensuite initialisées avec les valeurs récupérées à partir de la BDD.
    $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
    return $stmt->fetch();
    //Cette méthode retourne un objet en cas de succès et un false en cas d'échec
  }
  
    // récupère plusieurs ressources
    // les paramètres $filters, $order, $limit et $offset son optionnel 
    protected function readMany(string $class, array $filters = [], array $order = [], int $limit = null, int $offset = null): mixed {
    $query = 'SELECT * FROM ' . $this->classToTable($class);
    //$filters = tableau de critères de filtre des ressources
    if (!empty($filters)) {
      $query .= ' WHERE ';
      foreach (array_keys($filters) as $filter) {
        $query .= $filter . " = :" . $filter;
        if ($filter != array_key_last($filters)) $query .= 'AND ';
      }
    }
    //$order = tableau de critères de tri des ressources
    if (!empty($order)) {
      $query .= ' ORDER BY ';
      foreach ($order as $key => $val) {
        $query .= $key . ' ' . $val;
        if ($key != array_key_last($order)) $query .= ', ';
      }
    }
    //$limit = tableau, nombre limitant la quantité de ressources à récupérer
    if (isset($limit)) {
      $query .= ' LIMIT ' . $limit;
      //$offset : tableau, nombre spécifiant un décalage pour la récupération de ressources
      if (isset($offset)) {
        $query .= ' OFFSET ' . $offset;
      }
    }
    
    $stmt = $this->executeQuery($query, $filters);
    
    $stmt->setFetchMode(\PDO::FETCH_CLASS, $class);
    return $stmt->fetchAll();
    // cette méthode retournera : un tableau d'objet ( collection) ou false
  }
    
    // méthode pour enregistrée une ressource dans une table
    // $fields = champs à enregistrer en BDD
    protected function create(string $class, array $fields): \PDOStatement {
    $query = "INSERT INTO " . $this->classToTable($class) . " (";
    foreach (array_keys($fields) as $field) {
      $query .= $field;
      if ($field != array_key_last($fields)) $query .= ', ';
    }
    $query .= ') VALUES (';
    foreach (array_keys($fields) as $field) {
      $query .= ':' . $field;
      if ($field != array_key_last($fields)) $query .= ', ';
    }
    $query .= ')';
    return $this->executeQuery($query, $fields);
    // retournera une instance de PDOStatement ou false
  }
    
    // méthode pour modifier une ressource au sein d'une table 
    protected function update(string $class, array $fields, int $id): \PDOStatement {
    $query = "UPDATE " . $this->classToTable($class) . " SET ";
    foreach (array_keys($fields) as $field) {
      $query .= $field . " = :" . $field;
      if ($field != array_key_last($fields)) $query .= ', ';
    }
    $query .= ' WHERE id = :id';
    $fields['id'] = $id;
    return $this->executeQuery($query, $fields);
    // retournera une instance de PDOStatement ou false
    }
    
    //méthode pour supprimer une ressource au sein d'une table
    protected function delete(string $class, int $id): \PDOStatement {
    $query = "DELETE FROM " . $this->classToTable($class) . " WHERE id = :id";
    return $this->executeQuery($query, [ 'id' => $id ]);
    // retournera une instance de PDOStatement ou false
    }
}
