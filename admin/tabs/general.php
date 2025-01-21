<?php
function headingCells() {
    ?><tr>
        <th scope="col">Title</th>
        <th scope="col">Shortcode</th>
        <th scope="col">Author</th>
        <th scope="col">Date</th>
    </tr><?php
}
?>
<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
<a href="?page=my-carousel&tab=carousel-edit" class="page-title-action">Create New Carousel</a>
<div id="mc__admin--list">
    <div class="col-container">
        <table class="striped widefat">
            <thead>
                <?php headingCells(); ?>
            </thead>
            <tbody>
                <?php
                $carousels = selectAllCarouselsList();
                foreach($carousels as $carousel) {
                    ?><tr class="mc__admin--item" >
                        <td class="has-row-actions"><?php echo $carousel->car_name; ?>
                            <div class="row-actions"><span class="edit"><a href="?page=my-carousel&tab=carousel-edit&carousel-id=<?php echo $carousel->id; ?>" aria-label="Edit “<?php echo $carousel->car_name; ?>”">Edit</a>
                            | </span><span class="trash"><a href="?page=my-carousel&tab=carousel-delete&carousel-id=<?php echo $carousel->id; ?>" class="submitdelete" aria-label="Move “<?php echo $carousel->car_name; ?>” to the Trash">Trash</a></span>
                        </div>
                        </td>
                        <td><pre><?php echo '[my-carousel id="'.$carousel->id.'"]'; ?></pre></td>
                        <td><?php echo $carousel->car_author; ?></td>
                        <td>Created<br><?php echo $carousel->car_date; ?></td>
                    </tr><?php
                }
                ?>
            </tbody>
            <tfoot>
                <?php headingCells(); ?>
            </tfoot>
        </table>
    </div>
</div>
<span class="mc__admin--signature">Developed with <span class="dashicons dashicons-heart
"></span> by <a href="https://eduvallve.com/portfolio/my-carousel/" target="_blank">eduvallve</a></span>
