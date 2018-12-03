<?php
include('page_head.php');
?>

<div class="container">

    <?php
    if(isset($_SESSION['admin_message'])){
        ?>
        <div class="alert alert-info">
            <p><?php echo $_SESSION['admin_message']; unset($_SESSION['admin_message']) ?></p>
        </div>
        <?php
    }
    ?>

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <div id="carousel-example-generic" class="carousel slide">
                    <!-- Indicators -->
                    <ol class="carousel-indicators hidden-xs">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive img-full" src="img/slide-1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive img-full" src="img/slide-2.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive img-full" src="img/slide-3.jpg" alt="">
                        </div>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="icon-next"></span>
                    </a>
                </div>
                <h2 class="brand-before">
                    <small>Welcome to</small>
                </h2>
                <h1 class="brand-name">Hotel</h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="box">
            <form action="search.php" method="GET">
                <div class="row">
                    <div class="col-sm-2">
                    </div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label>Search Term</label>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" name="search_term" class="form-control" required>
                                </div>
                                <div class="col-sm-2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <input type="submit" name="search" value="Search" class="btn btn-default">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row">

        <?php
        $rooms = $db->get('tbl_rooms');
        foreach($rooms as $room){
            ?>
            <div class="col-lg-4">
                <div class="box">
                    <hr>
                    <h2 class="intro-text text-center"><?php echo $room['room_title']; ?></h2>
                    <hr>
                    <img class="img-responsive" src="images/<?php echo $room['room_image']; ?>">
                    <hr>
                    <div class="text-center">
                        <?php echo nl2br($room['room_description']); ?>
                    </div>
                    <?php
                    if(isset($_SESSION['admin_user'])){
                        ?>
                        <br>
                        <div class="text-center">
                            <a href="admin_panel_delete_room.php?room_id=<?php echo $room['room_id']; ?>" class="btn btn-danger">Delete</a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

</div>
<!-- /.container -->

<?php
include('page_foot.php');
?>