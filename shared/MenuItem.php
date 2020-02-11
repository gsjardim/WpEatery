<?php
class MenuItem {
    private $itemName;
    private $description;
    private $price;
    private $imagePath;

   
    function MenuItem ($name, $description, $price, $img){
        $this->setItemName($name);
        $this->setDescription($description);
        $this->setPrice($price);
        $this->setImagePath($img);
    }
    
    public function setItemName($itemName){
        $this->itemName = $itemName;
    }
    
    public function getItemName(){
        return $this->itemName;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    
     public function getDescription(){
        return $this->description;
    }
    
    public function setPrice($price){
        $this->price = $price;
    }
    
     public function getPrice(){
        return $this->price;
    }
    
    public function setImagePath($img){
        $this->imagePath = $img;
    }
    
     public function getImagePath(){
        return $this->imagePath;
    }
}
?>
