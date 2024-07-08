<?php

class Postagem
{
    public static function selectAll()
    {
        $con = Connection::getConn();
        
        $sql = "SELECT * FROM postagem ORDER BY id DESC";
        $sql = $con->prepare($sql);
        $sql->execute();

        $result = array();
        while ($row = $sql->fetchObject('Postagem')) {
            $result[] = $row;
        }
        
        if(!$result) {
            throw new Exception("Não foi encontrado nenhum registro no banco");
        }
        return $result;
    }

    public static function selectById($id = null)
    {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM postagem WHERE id = :id";
        $sql = $conn->prepare($sql);
        $sql->bindValue(':id', $id, PDO::PARAM_INT);
        $sql->execute();

        $res = $sql->fetchObject('Postagem');

        if(!$res) {
            throw new Exception("Não foi encontrado nenhum registro no banco de dados");
        } else {
            $res->comentarios = Comentario::selectComments($res->id);

            if(!$res->comentarios){
                $res->comentarios = "Não existe nenhum comentário nesta publicação!";
            }
        }

        return $res;
    }
}