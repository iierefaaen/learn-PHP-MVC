<?php

class Detail {
    public function index(){
        echo "DETAIL : ERROR 404";
        echo "<br><br>";
        echo "NO DATA AVAILABLE";
    }

    public function student($id = "000") {
        echo "DETAIL:";
        echo "<br>";
        echo "USER: TEST";
        echo "<br>";
        echo "ID : $id";
    }
}