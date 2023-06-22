<?php

// Get all figurines
function getAllFigurines() {
    global $conn;
    $sql = "SELECT * FROM figurine";
    $result = $conn->query($sql);
    
    $figurines = array();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $figurines[] = $row;
        }
    }
    
    return $figurines;
}

// Get licence by id
function getLicenceById($id) {
    global $conn;
    $sql = "SELECT * FROM licence WHERE LicenceID = $id";
    $result = $conn->query($sql);
    
    $licence = array();
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $licence[] = $row;
        }
    }
    
    return $licence;
}

?>