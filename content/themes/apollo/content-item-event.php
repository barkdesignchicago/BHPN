<!-- debug:content-item-event.php -->
<?php
    $date = DateTime::createFromFormat('Ymd', get_field("event_date"));
?>              <div class="item event">
                    <div class="item-date-icon"><span class="date-icon-month"><?php echo strtoupper($date->format('M'))?></span> <span class="date-icon-date"><?php echo $date->format('d') ?></span></div>
                    <div class="item-text">
                        <h4><a href="<?php echo get_the_permalink() ?>"><?php echo get_the_title() ?></a></h4>
                        <p ><?php echo $date->format('m/d/Y').", ".get_the_excerpt() ?>, <a href="<?php echo get_the_permalink() ?>" class="read-more">View Event Details</a></p>
                    </div>
                </div>