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
    $req = $this->db->prepare('INSERT INTO heroes (name) VALUES (:name)');
    $req->execute([
        'name' => $hero->getName()
    ]);
    $heroId = $this->db->lastInsertId();
    return $heroId;
    }

    public function findAllAlive(){
        $req =$this->getDb()->prepare('SELECT * from heroes WHERE healt_point > 0');
        $req->execute();

        $heros = $req->fetchAll(PDO::FETCH_ASSOC);

        $herosdatas = [];

        foreach($heros as $herodata){
                $herosdatas[] = new Hero($herodata, 100);
        }
        return $herosdatas;
    }

    public function find($id):Hero
    {
        $statement = $this->getDb()->prepare("SELECT * FROM heroes WHERE id=$id");
        $statement->execute();
        $hero = $statement->fetch();

        $newHero = new Hero([]);
        $newHero->setName($hero['name']);
        $newHero->setId($hero['id']);
        $newHero->setHealt_point($hero['healt_point']);

        return $newHero;
    }
}