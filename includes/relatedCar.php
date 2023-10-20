<?php
    if(isset($_GET["cat_id"])){
		$id = $_GET["cat_id"];
    }
    try{
        $data = "SELECT * FROM `cars`  WHERE cars.cat_id = 5";
        $result = $conn->prepare($data);
        $result->execute();
    
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        }
    
?>


<!-- Related Car Start -->
<div class="container-fluid pb-5">
        <div class="container pb-5">
            <h2 class="mb-4">Related Cars</h2>
            <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
            <?php 
                foreach($result->fetchAll() as $state){
                    $catId = $state["cat_id"];
                    $id = $state["id"];
                    $title = $state["Title"];
                    $image = $state["Image"];
                    $model = $state["Model"];
                    $auto = $state["Auto"];
                    if($auto){
                        $autoStr = "Auto";
                    }else{
                        $autoStr = "Manual";

                    }
                    $properties = $state["Properties"];
                    $price = $state["Price"];

                ?>
                <div class="rent-item">
                    <img class="img-fluid mb-4" src="img/<?php echo $image ?>" alt="<?php echo $title ?>">
                    <h4 class="text-uppercase mb-4"><?php echo $title ?></h4>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="px-2">
                            <i class="fa fa-car text-primary mr-1"></i>
                            <span><?php echo $model ?></span>
                        </div>
                        <div class="px-2 border-left border-right">
                            <i class="fa fa-cogs text-primary mr-1"></i>
                            <span><?php echo $autoStr ?></span>
                        </div>
                        <div class="px-2">
                            <i class="fa fa-road text-primary mr-1"></i>
                            <span><?php echo $properties ?></span>
                        </div>
                    </div>
                    <a class="btn btn-primary px-3" href="detail.php?id= <?php echo $id ?>">$<?php echo $price?>/Day</a>
                    
                </div>
                <?php
                }
                ?> 
            </div>
            
        </div>
    </div>
    <!-- Related Car End -->