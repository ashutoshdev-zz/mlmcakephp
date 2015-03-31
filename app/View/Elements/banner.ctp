<div class="banner">
    <div class="container">
        <div data-ride="carousel" class="carousel slide" id="carousel-example-captions">
            <ol class="carousel-indicators">
                <li class="" data-slide-to="0" data-target="#carousel-example-captions"></li>
                <li data-slide-to="1" data-target="#carousel-example-captions" class="active"></li>
                <li data-slide-to="2" data-target="#carousel-example-captions" class=""></li>
            </ol>
            <div role="listbox" class="carousel-inner">
                <?php
                foreach ($staticbanner as $staticbSlider) {
                    $banner[] = $staticbSlider['Staticpage'];
                }
                for ($i = 0; $i < count($banner); $i++) {
                    if ($i == 0) {
                        ?>
                        <div class="item active">
                            <?php
                        } else {
                            ?>
                            <div class="item">
                                <?php
                            }
                            ?>



                            <?php echo $this->Html->image('../files/staticpage/' . $banner[$i]['image']); ?>
                            <div class="carousel-caption">
                                <h3> <?php echo $banner[$i]['title']; ?></h3>
                                <p> <?php echo $banner[$i]['description']; ?></p>
                            </div>
                        </div>
                    <?php } ?>

                </div>
                <a data-slide="prev" role="button" href="#carousel-example-captions" class="left carousel-control">
                    <span aria-hidden="true" class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a data-slide="next" role="button" href="#carousel-example-captions" class="right carousel-control">
                    <span aria-hidden="true" class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>