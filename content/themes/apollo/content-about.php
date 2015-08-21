<!-- debug: content-about.php -->
<div class="row">
    <div class="container wireframebox fullwidth">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1 ">
                    <header>
                        <h1>Our Shared Vision<?php //the_title(); ?></h1>
                    </header><!-- .entry-header -->        
                    <?php the_content(); ?>
                    
                    <input type="button" value="Connect  With Us">
                    
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    h1 {
        text-align: center;
    }
    
    @media (min-width:768px) {
        h1 {
            text-align: left;
        }
    }



</style>




<?php /*        <!-- Supporters -->
 <div class="container wireframebox fullwidth">
        <section class="row">
            <div class="container"><div class="row">
            <div class="col-xs-12">
       
        <?php if( get_field( "supporters_section_title" ) ): ?>
            <h2><?php the_field( "supporters_section_title" ); ?></h2>
        <?php endif; ?>
        
        <?php if( get_field( "supporters_section_content" ) ): ?>
            <?php the_field( "supporters_section_content" ); ?>
        <?php endif; ?>
        
		<?php if( have_rows('supporters_organizations') ): ?>
        
            <ul class="slides list-inline">

            <?php while( have_rows('supporters_organizations') ): the_row(); 

                $image = get_sub_field('supporters_org_logo');
                $orglink = get_sub_field('supporters_org_link');
                $name = get_sub_field('supporters_org_name');
                ?>

                <li class="slide"> <!-- see http://www.bootply.com/94444 for scrolling logo effect -->

                    <a href="<?php echo $orglink ?>"><img src="<?php echo $image['url']; ?>" class="supporter-logo" alt="<?php echo $name ?>" /></a>

                </li>

            <?php endwhile; ?>

            </ul>
        <?php endif; ?>
        
        <?php if( get_field( "supporters_call_to_action_link" ) ): ?>
            <a href="<?php the_field( "supporters_call_to_action_link" ); ?>" class="btn btn-default btn-lg" role="button">
                <?php if( get_field( "supporters_call_to_action_text" ) ): ?>
                    <?php the_field( "supporters_call_to_action_text" ); ?>
                <?php endif; ?></a>
        <?php endif; ?>
        </div>
            </div>
        </div>
    </section>
</div>*/ ?> 
        <!-- About the Network -->
    
 <div class="container wireframebox fullwidth">
        <section class="row">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-push-1">

                        <?php if( get_field( "about_section_title" ) ): ?>
                    <h2><?php the_field( "about_section_title" ); ?></h2>
                <?php endif; ?>

                <?php if( have_rows('about_page_tabs') ): ?>

                <ul class="nav nav-tabs" role="tablist">
                    <?php
                    $count = 1;
                    while( have_rows('about_page_tabs') ): the_row(); 

                        // vars
                            $about_title = get_sub_field('about_tab_title');
                            $about_link = get_sub_field('about_tab_link_id');
                         ?>
                        <li<?php if ( $count == 1 ) {
                              echo ' class="active"';
                            }?>>
                            <a href="#<?php echo $about_link ?>" data-toggle="tab"><?php echo $about_title ?></a>
                        </li>
                     <?php
                        $count++;
                        endwhile;
                     ?>
                </ul>
                <div class="tab-content">
                <?php
                    $count = 1;
                    while( have_rows('about_page_tabs') ): the_row(); 

                        // vars
                        $about_content = get_sub_field('about_tab_content');
                        $about_link = get_sub_field('about_tab_link_id');
                    ?>
                     <div class="tab-pane<?php if ( $count == 1 ) {
                              echo ' active';
                            }?>" id="<?php echo $about_link ?>"><?php echo $about_content ?></div>

                <?php
                    $count++;
                    endwhile; ?>
                </div>

                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>        
        <!-- Sectors -->
    
 <div class="container wireframebox fullwidth">
    <section class="row">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-10 col-sm-push-1">

            <?php if( get_field( "sectors_section_title" ) ): ?>
                <h2><?php the_field( "sectors_section_title" ); ?></h2>
            <?php endif; ?>

            <?php if( have_rows('sectors_page_tabs') ): ?>

            <ul class="nav nav-tabs" role="tablist">
                <?php
                $count = 1;
                while( have_rows('sectors_page_tabs') ): the_row(); 

                    // vars
                        $sectors_title = get_sub_field('sectors_tab_title');
                        $sectors_link = get_sub_field('sectors_tab_link_id');
                    ?>
                    <li<?php if ( $count == 1 ) {
                          echo ' class="active"';
                        }?>>
                        <a href="#<?php echo $sectors_link ?>" data-toggle="tab"><?php echo $sectors_title ?></a>
                    </li>
                 <?php
                    $count++;
                    endwhile;
                 ?>
            </ul>
            <div class="tab-content">
            <?php
                $count = 1;
                while( have_rows('sectors_page_tabs') ): the_row(); 

                    // vars
                    $sectors_content = get_sub_field('sectors_tab_content');
                    $sectors_link = get_sub_field('sectors_tab_link_id');
                ?>
                 <div class="tab-pane<?php if ( $count == 1 ) {
                          echo ' active';
                        }?>" id="<?php echo $sectors_link ?>"><?php echo $sectors_content ?></div>

            <?php
                $count++;
                endwhile; ?>
            </div>

            <?php endif; ?>

            <?php if( get_field( "sectors_fact_sheets_section_title" ) ): ?>
                <h3><?php the_field( "sectors_fact_sheets_section_title" ); ?></h3>
            <?php endif; ?>

            <?php if( have_rows('sectors_fact_sheet') ): ?>

                <div class="row-container">

                <?php while( have_rows('sectors_fact_sheet') ): the_row(); 

                    $fact_sheet_title = get_sub_field('sectors_fact_sheet_title');
                    $fact_sheet_content = get_sub_field('sectors_fact_sheet_description');
                    $fact_sheet_link = get_sub_field('sectors_fact_sheet_link');
                    ?>

                    <div class="col-md-3 content-area wireframebox" id="main-column">
                        <h4><?php echo $fact_sheet_title ?></h4>
                        <?php echo $fact_sheet_content ?>
                        <a href="<?php echo $fact_sheet_link ?>">Download fact sheet</a>

                    </div>

                <?php endwhile; ?>

                </div>
            <?php endif; ?>
            <!-- end Sectors -->

            </div>
        </div>
        </div>
    </section>
</div>        


                        <!-- end about content -->