<?php
    class HeroRepository{
        private PDO $db;

        public function __construct(PDO $db){
            $this->setDb($db);
        }

        /**
         * Get the value of db
         */ 
        public function getDb()
        {
                return $this->db;
        }

        /**
         * Set the value of db
         *
         * @return  self
         */ 
        public function setDb($db)
        {
                $this->db = $db;

                return $this;
        }

        public function add(Hero $hero)
        {
    $req = $this->db->prepare('INSERT INTO heroes (name, categorie, images) VALUES (:name, :categorie, :images)');

    $uploadedFile = $_FILES['images'];
    if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
        // Définir le chemin où enregistrer le fichier
        $uploadDir = 'upload/'; // Répertoire où vous souhaitez stocker les images
        $uploadPath = $uploadDir . basename($uploadedFile['name']);

        // Déplacer le fichier vers le répertoire d'upload
        move_uploaded_file($uploadedFile['tmp_name'], $uploadPath);

        // Enregistrement du chemin dans la base de données
        $hero->setImages($uploadPath);
    }

    $req->execute([
        'name' => $hero->getName(),
        'categorie' => $hero->getCategorie(),
        'images'=> $hero->getImages()
    ]);
    $heroId = $this->db->lastInsertId();
    return $heroId;
    }

    public function findAllAlive(){
        $req =$this->getDb()->prepare('SELECT * from heroes WHERE healt_point > 0');
        $req->execute();

        $heros = $req->fetchAll(PDO::FETCH_ASSOC);

        $herosdatas = [];

        foreach ($heros as $herodata) {
            switch ($herodata['categorie']) {
                case 'guerrier':
                    $herosdatas[] = new Guerrier($herodata, 100);
                    break;
                case 'mage':
                    $herosdatas[] = new Mage($herodata, 100);
                    break;
                case 'archer':
                    $herosdatas[] = new Archer($herodata, 100);
                    break;
                // Ajout d'autres catégories
            }
        }
        
        return $herosdatas;
    }

    public function find($id):Hero
    {
        $sql = 'SELECT * FROM heroes WHERE id = :id';
        $statement = $this->getDb()->prepare($sql);
        $statement->bindValue(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $hero = $statement->fetch();

        if (!$hero) {
            throw new Exception("Hero not found");
        }
        $newHero = null;

        if ($hero['categorie'] === 'guerrier') {
            $newHero = new Guerrier($hero);
        } elseif ($hero['categorie'] === 'mage') {
            $newHero = new Mage($hero);
        } elseif ($hero['categorie'] === 'archer') {
            $newHero = new Archer($hero);
        } else {
            throw new Exception("Unknown hero category: " . $hero['categorie']);
        }
    
    
        $newHero->setName($hero['name']);
        $newHero->setId($hero['id']);
        $newHero->setHealt_point($hero['healt_point']);

        return $newHero;
    }
    public function update(Hero $hero){
          $req = ('UPDATE heroes SET healt_point = :healt_point WHERE id = :id'); 
          $result = $this->db->prepare($req);
          $result->execute([
            ':healt_point'=> $hero->getHealt_point(),
            ':id'=> $hero->getId()
          ]);
          
    }
}