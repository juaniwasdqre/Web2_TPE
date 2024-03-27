<?php
require_once 'model.php';

require_once './app/helpers/db.helper.php';

class ArtistasModel extends Model{
    protected $db;

    public function getArtists(){
        $query = $this->db->prepare('SELECT * FROM artistas');
        $query->execute();
        $artists = $query->fetchAll(PDO::FETCH_OBJ);
        return $artists;
    }

    public function addArtist($aname, $ayear, $acountry){
        $query = $this->db->prepare('INSERT INTO artistas (aname, ayear, country) VALUES (?,?,?)');
        $query->execute([$aname, $ayear, $acountry]);
        return $this->db->lastInsertId();
    }

    public function deleteArtist($id){
        $query = $this->db->prepare('DELETE FROM artistas WHERE artist_id = ?');
        $query->execute([$id]);
    }
}