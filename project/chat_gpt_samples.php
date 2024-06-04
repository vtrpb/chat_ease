
           <?php foreach ($ads as $ad): ?>
                <?php if (!empty($ad->ad_images)): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="img-box">
                            <a href="<?= $this->Url->image('uploads/' . $ad->ad_images[0]->name) ?>" data-gal="prettyPhoto[galleryName]">
                                <div class="img-open">
                                    <i class="ion-expand-outline"></i>
                                </div>
                                <img src="<?= $this->Url->image('uploads/' . $ad->ad_images[0]->name) ?>" class="img-fluid" alt="">
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php foreach ($ads as $ad): ?>
            <?php if (!empty($ad->ad_images)): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="img-box">
                    <div class="owl-carousel owl-theme">
                        <?php foreach ($ad->ad_images as $image): ?>
                            <div class="item">
                                <a href="<?= $this->Url->image('uploads/' . $image->name) ?>" data-gal="prettyPhoto[galleryName]">
                                    <div class="img-open">
                                        <i class="ion-expand-outline"></i>
                                    </div>
                                    <img src="<?= $this->Url->image('uploads/' . $image->name) ?>" class="img-fluid" alt="">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>