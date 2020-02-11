<?php include('./shared/header.php');
include('./shared/MenuItem.php');?>
         
            <div id="content" class="clearfix">
                <aside>
                    <?php 
                   

                    $items = array();
                    
                    $i=1; $star='*';
                    while($i<5){
                        
                        if(($i%2)!=0){
                            $items[$i] = new MenuItem("The WP Burger$star$i",
                                'Freshly made all-beef patty served up with homefries',
                                '$14','images/burger_small.jpg');
                        }
                        else{
                            $items[$i] = new MenuItem("WP Kebobs$star$i",
                                'Tender cuts of beef and chicken, served with your choice of side',
                                '$17','images/kebobs.jpg');
                        }
                        $i++;
                        $star .= '*';
                    }
                        //The jddayofweek function was based on the website https://www.tutorialspoint.com/php/php_function_jddayofweek.htm
                        echo "<h2>".jddayofweek(date('w')-1, 1)."'s Special </h2>
                         <hr>";
                        
                        for ($i=1; $i<5; $i++){
                            if ($i%2!=0){
                                echo "<img src= '" . $items[$i]->getImagePath(). "' alt='Burger' title='Monday's Special - Burger'>";
                                echo "<h3>". $items[$i]->getItemName()."</h3>";
                                echo "<p>" .$items[$i]->getDescription(). " - ". $items[$i]->getPrice()."</p>
                                <hr>";
                                
                            }
                            else{
                                echo "<img src='".$items[$i]->getImagePath()."' alt='Kebobs' title='WP Kebobs'>";
                                echo "<h3>".$items[$i]->getItemName()."</h3>";
                                echo "<p>" .$items[$i]->getDescription()." - " .$items[$i]->getPrice()."</p>
                                <hr>";
                            }
                        }
                        ?>
                    
                </aside>
                <div class="main">
                    <h1>Welcome</h1>
                    <img src="images/dining_room.jpg" alt="Dining Room" title="The WP Eatery Dining Room" class="content_pic">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <h2>Book your Christmas Party!</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                </div><!-- End Main -->
            </div><!-- End Content -->
 <?php include('./shared/footer.php');?>