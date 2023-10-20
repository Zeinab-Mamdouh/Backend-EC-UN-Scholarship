<?php
    try{
        $data = "SELECT `Name`, `Position`, `Content`, `Image` FROM `testimonials`";
        $result = $conn->prepare($data);
        $result->execute();
    
    }catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
        }
?>

    <!-- Testimonial Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <h1 class="display-1 text-primary text-center">05</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Our Client's Say</h1>
            <div class="owl-carousel testimonial-carousel">
            <?php 
                        foreach($result->fetchAll() as $state){
                            $name = $state["Name"];
                            $position = $state["Position"];
                            $content = $state["Content"];
                            $image = $state["Image"];
        
                            ?>
                <div class="testimonial-item d-flex flex-column justify-content-center px-4">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <img class="img-fluid ml-n4" src="img/<?php echo $image ?>" alt="<?php echo $title ?>">
                        <h1 class="display-2 text-white m-0 fa fa-quote-right"></h1>
                    </div>
                    <h4 class="text-uppercase mb-2"><?php echo $name ?></h4>
                    <i class="mb-2"><?php echo $position ?></i>
                    <p class="m-0"><?php echo $content ?></p>
                </div>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->